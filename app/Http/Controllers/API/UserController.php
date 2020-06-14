<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Roles;
use App\UserProfile;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $validasi = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        if (Auth::attempt($validasi)) 
        {
            $user = Auth::user();
            $token = $user->createToken('api_token')->accessToken; //createToken in VSCode undifinde but still working


            return response()->json(['user' => $user ,'api_token' => $token], 200);
        } 
        else 
        {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }


    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','confirmed'],
        ]);
        
        if ($validator->fails()) { 
            return response()->json([
                'error'=>$validator->errors()
            ], 401);            
        }
        
        $data = $request->all(); 

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            //'api_token' => Str::random(60),
        ]);

         //Attach role user Customer
         $role_user  = Roles::where('id', '2')->first();
         $user->roles()->attach($role_user);
 
         //Add relation to UserProfile
         $profile = new UserProfile;
         $user->punyaProfile()->save($profile);
 

        $token = $user->createToken('api_token')->accessToken; 
        

        return response()->json(['user' => $user ,'api_token' => $token], 200);
    }





    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
