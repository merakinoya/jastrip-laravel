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
        return $this->hasMany('App\Products');
    }
}
