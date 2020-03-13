<?php

namespace App\Services;

use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Socialite\Facades\Socialite;

class SocialUserResolver
{
    /**
     * Resolve user by provider credentials.
     *
     * @param string $provider
     * @param string $accessToken
     * @param string|null $secret
     * @return Authenticatable|null
     */
    public function resolveUserByProviderCredentials(string $provider, string $accessToken, string $secret = null): ?Authenticatable
    {
        $providerUser = null;

        try {
            if (is_null($secret)) {
                $providerUser = Socialite::driver($provider)->userFromToken($accessToken);
            } else {
                $providerUser = Socialite::driver($provider)->userFromTokenAndSecret($accessToken, $secret);
            }
        } catch (Exception $exception) {}

        if ($providerUser) {
            return (new SocialAccountsService())->findOrCreate($providerUser, $provider);
        }

        return null;
    }
}