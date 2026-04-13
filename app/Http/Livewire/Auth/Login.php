<?php

namespace App\Http\Livewire\Auth;

// use App\Http\Controllers\Auth\AuthController;
use App\Services\Auth\AuthService;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\Component;

class Login extends Component
{

    public $user;
    public $password;
    public function mount(Request $request, AuthService $sso): void
    {
        if (Auth::check()) {
            $this->redirectIntended('/dashboard', navigate: true);
            return;
        }

        // Jika sebelumnya gagal callback, tampilkan mode manual agar tidak loop.
        if ($request->boolean('manual')) {
            return;
        }

        $this->redirect($sso->buildAuthorizeUrl(), navigate: false);
    }

    public function retry(AuthService $sso): void
    {
        $this->redirect($sso->buildAuthorizeUrl(), navigate: false);
    }

    public function login()
    {
        $this->validate(
            [
                'user' => ['required', 'string'],
                'password' => ['required', 'string'],
            ]
        );

        // dd(AuthController::login($this->user, $this->password));
        if (AuthService::login($this->user, $this->password)) {
            session()->flash('message', 'Login berhasil!');
            return redirect()->intended('/');
        } else {
            session()->flash('error', 'Login gagal. Silakan periksa kredensial Anda.');
            $this->reset(['user', 'password']);
        }
    }

    #[Layout('layouts.auth.app')]
    #[Title('Login')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
