<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * @return RedirectResponse
     */
    public function callback(): RedirectResponse
    {
        $googleUser = Socialite::driver('google')->user();

        $user = $this->findUser($googleUser);

        Auth::login($user);

        return redirect(route('index'));
    }

    /**
     * @param SocialiteUser $googleUser
     * @return User|Model
     */
    private function findUser(SocialiteUser $googleUser): User
    {
        try {
            return User::query()
                       ->where('email', $googleUser->getEmail())
                       ->where('google_id', $googleUser->getId())
                       ->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            try {
                $user = User::query()
                            ->where('email', $googleUser->getEmail())
                            ->firstOrFail();

                $user->update(['facebook_id' => $googleUser->getId()]);

                return $user;
            } catch (ModelNotFoundException $exception) {
                return User::create([
                                        'name' => $googleUser->getName(),
                                        'email' => $googleUser->getEmail(),
                                        'password' => Hash::make(Str::random(32)),
                                        'google_id' => $googleUser->getId()
                                    ]);
            }
        }
    }
}
