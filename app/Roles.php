<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'created_at', 'updated_at'
    ];

    
    public function users()
    {
        return $this->belongsToMany('App\User','role_users','role_id','user_id')->withTimestamps();
    }
}
