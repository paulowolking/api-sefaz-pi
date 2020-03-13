<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function me(Request $request)
    {
        return $request->user();
    }

    public function show(Request $request, $userId)
    {
        return User::findOrFail($userId);
    }

    public function store(CreateUserRequest $request)
    {
        $user_data = $request->only('email','name','password');

        $user = new User;
        $this->save($user, $user_data, $request->file('photo'));

        $user->sendEmailVerificationNotification();

        return $user;
    }

    public function update(UpdateUserRequest $request)
    {
        $user_data = $request->only('email','name','password');

        $user = $request->user();
        $this->save($user, $user_data, $request->file('photo'));

        return $user;
    }

    private function save(User $user, $data, $photo)
    {
        $user->email = $data['email'];
        $user->name = $data['name'];
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
}
