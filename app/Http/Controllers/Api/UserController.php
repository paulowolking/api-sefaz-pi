<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\FcmToken;
use App\Models\User;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Show autheticated user
     *
     * @param Request $request
     * @return mixed
     */
    public function me(Request $request)
    {
        return $request->user();
    }

    /**
     * Show user by Id
     *
     * @param Request $request
     * @param $userId
     * @return User|User[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show(Request $request, $userId)
    {
        return User::findOrFail($userId);
    }

    /**
     * Create User
     *
     * @param CreateUserRequest $request
     * @return User
     */
    public function store(CreateUserRequest $request)
    {
        $user_data = $request->only('email','name','password');

        $user = new User;
        $this->save($user, $user_data, $request->file('photo'));

        $user->sendEmailVerificationNotification();

        return $user;
    }

    /**
     * Update User
     *
     * @param UpdateUserRequest $request
     * @return mixed
     */
    public function update(UpdateUserRequest $request)
    {
        $user_data = $request->only('email','name','password');

        $user = $request->user();
        $this->save($user, $user_data, $request->file('photo'));

        return $user;
    }

    /**
     * Save User
     *
     * @param User $user
     * @param $data
     * @param $photo
     */
    private function save(User $user, $data, $photo)
    {
        if (isset($data['name'])) {
            $user->name = $data['name'];
        }
        if (isset($data['email'])) {
            $user->email = $data['email'];
        }        
        if (isset($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        if ($photo) {
            if ($user->photo) {
                Storage::delete($user->photo);
            }
            $path = 'public/users/photos/' . time() . '.' . $photo->getClientOriginalExtension();
            $user->photo = $path;
            Storage::put($path, Image::make($photo)->fit(300, 300)->stream());
        }
        $user->save();
    }

    /**
     * Register FcmToken by User
     *
     * @param Request $request
     * @return FcmToken|\Illuminate\Database\Eloquent\Model
     */
    public function fcmTokenRegister(Request $request)
    {
        return FcmToken::create([
            'user_id' => $request->user()->id,
            'token' => $request->get('token'),
            'platform' => $request->get('platform'),
        ]);
    }

    /**
     * Send user notification
     *
     * @param Request $request
     * @param FirebaseService $firebaseService
     * @return array
     */
    public function notify(Request $request, FirebaseService $firebaseService)
    {
        return $firebaseService->notify($request->all());
    }
}
