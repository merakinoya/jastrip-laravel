<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    //
    //protected $table = 'user_profiles';
    //protected $primaryKey = 'id';


    protected $fillable = [
        'gender','phone', 'img_photo','created_at', 'updated_at'
    ];

    public function dipunyaiUser()
    {
        return $this->belongsTo('App\User', 'id');
    }
}
