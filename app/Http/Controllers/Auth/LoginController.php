<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

use App\User;
use App\Roles;
use App\UserProfile;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     * $redirectTo = '/home';
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider($provider)
    {
        //return Socialite::driver('google')->redirect();
        return Socialite::driver($provider)->stateless()->user();
    }


    public function handleProviderCallback($provider)
    {
        //$user = Socialite::driver('google')->user();
        $getDataSocial = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($getDataSocial, $provider);
        Auth::login($authUser, true);

        return redirect('/');
    }

     /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($getDataSocial, $provider)
    {

        // Check existing user
        $user = User::where('provider_id', $getDataSocial->id)->first();
        $userEmail = User::where('email', $getDataSocial->email)->first();

        if (!$user) {
            $user = User::create([
               'name'     => $getDataSocial->name,
               'email'    => $getDataSocial->email,
               'provider' => $provider,
               'provider_id' => $getDataSocial->id
           ]);

           //Attach role user Customer
         $role_user  = Roles::where('id', '1')->first();
         $user->roles()->attach($role_user);
 
         //Add relation with data to UserProfile
         $profile = new UserProfile;
         $profile->img_photo = $getDataSocial->getAvatar();
         $user->punyaProfile()->save($profile);

         }
         return $user;
    }

    public function findOrCreateUserA($user, $provider)
    {
        $authbyEmail = User::where('email', $user->email)->first();
        $authUser = User::where('provider_id', $user->id)->first();
        
        if ($authUser)
        {
            return $authUser;
        }
        else
        {
            $data = User::create([
                'name'     => $user->name,
                'email'    => !empty($user->email)? $user->email : '' ,
                'provider' => $provider,
                'provider_id' => $user->id
            ]);

            return $data;
        }
    }
}
