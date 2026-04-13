<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\Permission\PermissionService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RuntimeException;

class AuthService
{

     public function buildAuthorizeUrl(): string
    {
        $state = Str::random(40);
        $codeVerifier = Str::random(96);
        $codeChallenge = $this->base64UrlEncode(hash('sha256', $codeVerifier, true));

        session([
            'sso_oauth_state' => $state,
            'sso_code_verifier' => $codeVerifier,
        ]);

        $query = http_build_query([
            'client_id' => config('services.sso.client_id'),
            'redirect_uri' => config('services.sso.redirect_uri'),
            'response_type' => 'code',
            'scope' => '',
            'state' => $state,
            'code_challenge' => $codeChallenge,
            'code_challenge_method' => 'S256',
        ]);

        return rtrim((string) config('services.sso.base_url'), '/') . '/oauth/authorize?' . $query;
    }

    public function exchangeCodeToAccessToken(string $code, string $state): string
    {
        $savedState = (string) session()->pull('sso_oauth_state');
        $codeVerifier = (string) session()->pull('sso_code_verifier');

        if ($savedState === '' || $codeVerifier === '' || ! hash_equals($savedState, $state)) {
            throw new RuntimeException('State OAuth tidak valid.');
        }

        $response = Http::asForm()->post(
            rtrim((string) config('services.sso.base_url'), '/') . '/oauth/token',
            [
                'grant_type' => 'authorization_code',
                'client_id' => config('services.sso.client_id'),
                'redirect_uri' => config('services.sso.redirect_uri'),
                'code' => $code,
                'code_verifier' => $codeVerifier,
            ]
        );

        if ($response->failed()) {
            throw new RuntimeException(sprintf(
                'Gagal tukar code ke access token. HTTP %d: %s',
                $response->status(),
                $response->body()
            ));
        }

        $accessToken = $response->json('access_token');

        if (! is_string($accessToken) || $accessToken === '') {
            throw new RuntimeException('Access token kosong.');
        }

        return $accessToken;
    }

    public function fetchUserProfile(string $accessToken): array
    {
        $response = Http::withToken($accessToken)->get(
            rtrim((string) config('services.sso.base_url'), '/') . '/api/v1/oauth/user'
        );

        if ($response->failed()) {
            throw new RuntimeException(sprintf(
                'Gagal ambil profil user dari SSO. HTTP %d: %s',
                $response->status(),
                $response->body()
            ));
        }

        $profile = $response->json();

        if (! is_array($profile) || ! isset($profile['email'], $profile['name'])) {
            throw new RuntimeException('Format profil user SSO tidak valid.');
        }

        return $profile;
    }

    private function base64UrlEncode(string $value): string
    {
        return rtrim(strtr(base64_encode($value), '+/', '-_'), '=');
    }

    public static function login($usr, $password, )
    {

        $user = User::where('usr', $usr)->first();
        // $routeName = $request->route()->getName();
        if ($user && $user->pswd === md5($password)) {
           if(PermissionService::can($user, 'dashboard', 'can_access')){
               Auth::login($user);
               return true;
            }
            return false;
        }
        return false;
    }
    
}
