<?php
/**
 * Created by PhpStorm.
 * User: wellingtonribeiro
 * Date: 2020-03-17
 * Time: 14:13
 */

namespace App\Services;

use App\Models\User;
use App\Notifications\GenericNotification;
use App\Notifications\TopicRecipient;
use Illuminate\Validation\Rule;

class FirebaseService
{
    public function notify(array $dados)
    {
        $validator = \Validator::make($dados, [
            'topics' => 'required_without:user_ids|array',
            'user_ids' => 'required_without:topics|array',
            'title' => 'required',
            'message' => 'required',
            'action' => 'sometimes|min:1',
            'params' => 'sometimes|array',
            'link' => 'sometimes|min:1',
            'broadcast' => 'sometimes|min:1',
            'channels' => ['sometimes', 'array', Rule::in(['mail','fcm','database'])],
        ]);

        if ($validator->fails()) {
            return [
                'error' => true,
                'message' => $validator->errors()
            ];
        }

        if (isset($dados['topics'])) {
            foreach($dados['topics'] as $topic) {
                (new TopicRecipient($topic))
                    ->notify(GenericNotification::create(
                        $dados['title'],
                        $dados['message']
                    ));
            }
        } else {
            foreach ($dados['user_ids'] as $user_id) {
                if ($user = User::find($user_id)) {
                    $user->notify(new GenericNotification(
                        $dados['title'],
                        $dados['message'],
                        isset($dados['channels']) ? $dados['channels'] : ['mail','fcm','database'],
                        isset($dados['action']) ? $dados['action'] : null,
                        isset($dados['params']) ? $dados['params'] : null,
                        isset($dados['link']) ? $dados['link'] : null,
                        isset($dados['broadcast']) ? $dados['broadcast'] : null
                    ));
                }
            }
        }

        return [
            'message' => 'The message is being processed'
        ];
    }

}