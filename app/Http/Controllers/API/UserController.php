<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

use App\User;
use App\Roles;
use App\UserProfile;
use App\Seller;

class UserController extends Controller
{

    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me)
        $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]);
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


    public function login(Request $request)
    {
        $validasi = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'remember_me' => 'boolean'
        ]);

        if (!Auth::attempt($validasi)) {
            return response(['message' => 'Invalid Credentials']);
        }


        $user = Auth::user();
        $token = $user->createToken('access_token')->accessToken; //createToken in VSCode undifinde but still working
        
        return response()->json([
            'user' => $user,
            'access_token' => $token
        ], 200);

    }


    
    // 127.0.0.1:8000/API/register

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            //'api_token' => Str::random(60),
        ]);

        //Attach role user Customer
        $role_user  = Roles::where('id', '1')->first();
        $user->roles()->attach($role_user);

        //Add relation to UserProfile
        $profile = new UserProfile;
        $user->punyaProfile()->save($profile);

        $seller = new Seller;
        $seller->name = "My Store";
        $user->punyaSeller()->save($seller);
  
        $accessToken = $user->createToken('authToken')->accessToken;

        return response()->json([
            'message' => 'Register successfully',
            'user' => $user,
            'access_token' => $accessToken
        ], 200);
    }



    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function userAccount()
    {
        $user = Auth::user();

        return response()->json([
            'message' => 'User Account is show',
            'data' => $user
        ], 200);
    }
}
