<?php
/**
 * Created by PhpStorm.
 * User: wellingtonribeiro
 * Date: 2019-08-06
 * Time: 16:54
 */

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Laravel\Socialite\AbstractUser as ProviderUser;
use Illuminate\Support\Facades\Storage;

class SocialAccountsService
{
    /**
     * Find or create user instance by provider user instance and provider name.
     *
     * @param ProviderUser $providerUser
     * @param string $provider
     *
     * @return User
     */
    public function findOrCreate(ProviderUser $providerUser, string $provider): User
    {
        $user = User::where("{$provider}_id", $providerUser->getId())->first();
        if ($user) {
            return $user;
        } else {
            if ($email = $providerUser->getEmail()) {
                $user = User::where('email', $email)->first();
            }
            if (!$user) {
                $user = new User;
                $user->name = $providerUser->getName();
                $user->email = $providerUser->getEmail();
                $user->email_verified_at = Carbon::now();
                $path = 'public/users/photos/' . time() . ".jpeg";
                if (Storage::put($path, file_get_contents($providerUser->getAvatar()))) {
                    $user->photo = $path;
                }
                $user->save();
            }
            return $user;
        }
    }
}