<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Models\User;
use App\Services\Auth\AuthService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Throwable;

class SsoCallbackPage extends Component
{
    public function mount(?string $code = null, ?string $state = null, AuthService $sso): void
    {
        try {
            if (! $code || ! $state) {
                throw new \RuntimeException('Parameter callback tidak lengkap.');
            }

            $accessToken = $sso->exchangeCodeToAccessToken($code, $state);
            $profile = $sso->fetchUserProfile($accessToken);

            $user = User::updateOrCreate(
                ['email' => $profile['email']],
                ['name' => $profile['name']]
            );

            Auth::login($user, true);
            session()->regenerate();

            session([
                'sso_access_token' => $accessToken,
            ]);

            $this->redirectIntended('/dashboard', navigate: true);
        } catch (Throwable $e) {
            session()->flash('error', $e->getMessage());
            $this->redirect(route('login', ['manual' => 1]), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.sso-callback-page');
    }
}