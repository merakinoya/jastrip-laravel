<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Str;
use Laravel\Passport\Passport;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function createToken()
    {
        $this->api_token = Str::random(60);
        $this->save();

        return $this->api_token;
    }


    //Conection to Many- Roles Tabel
    public function roles()
    {
        return $this->belongsToMany('App\Roles','role_users','user_id','role_id')->withTimestamps();
    }

    // Conection to One to One - Profile of User
    public function punyaProfile()
    {
        return $this->hasOne('App\UserProfile','user_id','id');
    }


    //Check punya role
    public function hasRole($role)
    {
        if($this->roles()->where('name', $role)->first())
        {
            return TRUE;
        }

        return FALSE;
    }

    public function hasAnyRole($roles)
    {
        if(is_array($roles))
        {
            foreach ($roles as $role)
            {
                if($this->hasRole($role))
                {
                    return TRUE;
                }
            }
        }
        else
        {
            if($this->hasRole($roles))
            {
                return TRUE;
            }
        }

        return FALSE;
    }

      
    public function authorizeRoles($roles)
    {
        if($this->hasAnyRole($roles))
        {
            return TRUE;
        }
        abort(401,'Tidak Boleh Akses');
    }


    /** Custom Role */

    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'mimin')
            {
                return TRUE;
            }            
        }
        return FALSE;
    }

    public function isUsers()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'customer')
            {
                return TRUE;
            }            
        }
        return FALSE;
    }

}
