<?php

namespace EasyShop\Http\Controllers\Api;

use EasyShop\Events\UserRegisterEvent;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\User;
use EasyShop\Services\ApiResponse;
use Illuminate\Http\Request;
use JWTAuth;

class AuthenticationController extends Controller
{
    protected $apiResponse;

    public function __construct(
        ApiResponse $apiResponse
    ) {
        $this->apiResponse = $apiResponse;
    }

    public function postLogin(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->apiResponse->success(['message' => 'invalid_credentials']);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->apiResponse->success(['message' => 'could_not_create_token']);
        }

        // all good so return the token
        return $this->apiResponse->success(['token' => $token]);
    }

    public function postRegister(Request $request)
    {
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->confirmed = 0;
        $user->confirmation_code =  md5(microtime() . config('app.key'));
        $user->save();

        event(new UserRegisterEvent($user));

        $credentials['email'] = $user->email;
        $credentials['password'] = $user->password;

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->apiResponse->success([
                    'message' => 'invalid_credentials'
                ]);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->apiResponse->success(['message' => 'could_not_create_token']);
        }

        // all good so return the token
        return $this->apiResponse->success([
            'token' => $token,
            'record' => $user
        ]);
    }
}
