<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    //
    protected $fillable = [
        'name',
    ];


    // Seller -punya> Products
    public function punyaProducts()
    {
        return $this->hasMany('App\Products','seller_id','id');
    }


    //  User <- Seller
    public function dipunyaiUser()
    {
        return $this->belongsTo('App\User', 'id');
    }
}
