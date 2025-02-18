<?php

namespace EmanElroukh\SocialiteLinks\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class SocialiteAuthController extends Controller
{
    /**
     * Redirect to the OAuth provider.
     */
    public function redirectToProvider(string $provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Handle the OAuth provider callback.
     */
    public function handleProviderCallback(string $provider): RedirectResponse
    {
        try {
            $providerUser = $this->getProviderUser($provider);
            $user = $this->findOrCreateUser($providerUser, $provider);
            Auth::login($user);
            return redirect()->route('store.index');
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }

    /**
     * Get the authenticated user from the provider.
     */
    protected function getProviderUser(string $provider): \Laravel\Socialite\Contracts\User
    {
        return $provider === 'twitter'
            ? Socialite::driver($provider)->user()
            : Socialite::driver($provider)->stateless()->user();
    }

    /**
     * Find or create a user based on the provider data.
     *
     * @param \Laravel\Socialite\Contracts\User $providerUser
     */
    protected function findOrCreateUser($providerUser, string $provider): User
    {
        $user = User::updateOrCreate(
            ['email' => $providerUser->getEmail()],
            ['name' => $providerUser->getName(),]
        );

        $socialData = [
            'user_id' => $user->id,
            'provider_type' => $provider,
            'provider_id' => $providerUser->getId(),
        ];
        DB::table('user_socials')->updateOrCreate($socialData, $socialData);
        return $user;
    }

}
