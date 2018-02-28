<?php

namespace App\Services;

use App\LinkedSocialAccount;
use App\User;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountsService
{
    public function findOrCreate(ProviderUser $providerUser, $provider){

        $account = LinkedSocialAccount::where('provider_name', $provider)
            ->where('provider_id', $providerUser->getId())
            ->first();


        if ($account) {
            return $account->user;
        } else {

            $user = User::where('email', $providerUser->getEmail())->first();


            if (!$user) {
                $user = User::create([
                    'email'    => $providerUser->getEmail(),
                    'name'     => $providerUser->getName(),
                    'mobile'   => ' ',
                    'password' => Str::random(20)]);
            }
            LinkedSocialAccount::create([
                'provider_id'   => $providerUser->getId(),
                'provider_name' => $provider,
                'user_id'       => $user->id,
            ]);

            return $user;

        }
    }


}