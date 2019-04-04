<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Model\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {

        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->errorResponse($validator->errors());
        }

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $user->save();

        return $this->successResponse('Successfully created user!');
    }
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->errorResponse('Invalid details');
        }

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)){
            return $this->errorResponse('Unauthorized');
        }

        if ( Auth::check() ) {
            //send them where they are going

            $user = Auth::user();
            $tokenResult = $user->createToken(env("APP_SECRET"));
            $user->access_token =$tokenResult->accessToken;
            if ($request->remember_me){
                $user->expires_at = Carbon::now()->addWeeks(1);
            }
            $user->token_type = 'Bearer';
            $user->expires_at = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();

            return $this->successResponse('Login Successful', $user, 201);
        }
        else{
            return $this->errorResponse('Invalid login details');
        }
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user(), 200);
    }
}