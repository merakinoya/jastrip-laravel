<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function punyaProducts()
    {
        return $this->hasMany('App\Products','seller_id','id');
    }

    public function dipunyaiUser()
    {
        return $this->belongsTo('App\User', 'id');
    }
}
