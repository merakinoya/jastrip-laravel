<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'seller_id', 
        'name', 
        'facility', 
        'start_at', 
        'finish_at', 
        'price',
        'img',
    ];


    public function dipunyaiSeller()
    {
        return $this->belongsTo('App\Seller', 'seller_id');
    }
}
