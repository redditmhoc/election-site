<?php

namespace App\Http\Controllers\Authentication;

use App\Exceptions\UserDeniedOAuthException;
use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RedditOAuthController extends Controller
{
    public function login()
    {
        Session::forget(['state', 'token']);
        Session::put('state', $state = Str::random(40));

        $request = http_build_query([
            'client_id' => config('reddit.oauth.client_id'),
            'response_type' => 'code',
            'state' => $state,
            'redirect_uri' => config('reddit.oauth.redirect_uri'),
            'duration' => 'temporary',
            'scope' => 'identity'
        ]);

        return redirect('https://www.reddit.com/api/v1/authorize?' . $request);
    }

    /**
     * @throws UserDeniedOAuthException
     */
    public function callback(Request $request)
    {
        // Check for errors
        if ($request->has('error')) {
            throw new UserDeniedOAuthException($request->get('error'));
        }

        // Check state
        $http = new Client();

        /**
         * Get token
         */
        try {
            $response = $http->post('https://www.reddit.com/api/v1/access_token', [
                'auth' => [
                    config('reddit.oauth.client_id'),
                    config('reddit.oauth.secret')
                ],
                'form_params' => [
                    'grant_type' => 'authorization_code',
                    'code' => $request->get('code'),
                    'redirect_uri' => config('reddit.oauth.redirect_uri')
                ]
            ]);

            $token = json_decode((string)$response->getBody(), true);
        } catch (GuzzleException $e) {
            Log::error($e);
            return redirect()->to('/')->with('top-negative-msg', 'Authentication failed. Please report to Developers. (Exception time ' . now()->toDayDateTimeString() . ', message ' . $e->getMessage() . ')');
        }

        /**
         * Get user data
         */
        try {
            $response = $http->get('https://oauth.reddit.com/api/v1/me', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token['access_token'],
                    'User_Agent' => config('app.name')
                ]
            ]);
        } catch (GuzzleException $e) {
            Log::error($e);
            return redirect()->to('/')->with('top-negative-msg', 'Authentication failed. Please report to Developers. (Exception time ' . now()->toDayDateTimeString() . ', message ' . $e->getMessage() . ')');
        }

        /**
         * Create/update user
         */
        $user = User::whereUsername($username = json_decode($response->getBody())->name)->first();

        if (!$user) {
            $user = User::create([
                'id' => Str::uuid(),
                'username' => $username,
                'password' => null,
                'password_enabled' => false
            ]);
            Log::info("New user created ($user->username)");
        }

        Auth::login($user, true);
        return redirect('/');
    }
}
