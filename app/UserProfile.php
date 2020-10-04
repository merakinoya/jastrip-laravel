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

    // Relation to One to One - Profile of User -punya> Products
    public function punyaProducts()
    {
        return $this->hasMany('App\Products','userprofile_id','id');
    }
}
