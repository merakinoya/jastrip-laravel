<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Laravel\Passport\PersonalAccessTokenResult;

class UserController extends Controller
{
    //
    public $successStatus = 200;

    public function login(){
        if(Auth::attempt([
            'email' => request('email'),
            'password' => request('password')]))
            {
            
            $user = Auth::user();
            //$success['token'] =  $user->createToken('MyApp')->accessToken;
            
            //return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
}
