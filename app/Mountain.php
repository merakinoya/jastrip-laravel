<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mountain extends Model
{
    //
    protected $fillable = [
        'mountain_name',
        'mdlp',
        'address',
        'latitude',
        'longitude',
        'url_google',
        'created_at', 'updated_at'
    ];
}
