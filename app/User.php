<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Passport\HasApiTokens;

use Illuminate\Support\Str;

class User extends Authenticatable
{
    use  HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function updateToken($request)
    {
        $token = Str::random(60);

        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return ['token' => $token];
    }


    //Relation to Many- Roles Tabel
    public function roles()
    {
        return $this->belongsToMany('App\Roles','role_users','user_id','role_id')->withTimestamps();
    }

    // Relation to One to One - Profile of User
    public function punyaProfile()
    {
        return $this->hasOne('App\UserProfile','user_id','id');
    }

    public function punyaSeller()
    {
        return $this->hasOne('App\Seller','user_id','id');
    }

    public function punyaProducts()
    {
        return $this->hasMany('App\Products','user_id','id');
    }

    public function punyaSellerAndProduct()
    {
        return $this->hasOneThrough(
            'App\Products',
            'App\Seller',
            'user_id', // Foreign key on seller table...
            'seller_id', // Foreign key on products table...
            'id', // Local key on users table...
            'id' // Local key on seller table...
        );
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
