<?php
/**
 * Created by PhpStorm.
 * User: wellington
 * Date: 2019-03-17
 * Time: 23:28
 */

namespace App\Notifications;

use Illuminate\Notifications\Notifiable;

class TopicRecipient
{
    use Notifiable;

    private $topic;

    public function __construct($topic)
    {
        $this->topic = $topic;
    }

    public function routeNotificationForFcm($notification)
    {
        return "/topics/" . $this->topic;
    }
}