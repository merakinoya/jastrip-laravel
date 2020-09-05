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
        'user_id',  
        
        'name',
        'description', 
        'price',
        'total_participant',
        
        'start_at', 
        'finish_at',

        'meet_point',
        'facility', 
        'terms_condition',
        'img',
    ];


    public function dipunyaiSeller()
    {
        return $this->belongsTo('App\Seller', 'seller_id');
    }

    public function dipunyaiUser()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function dipunyaiUserProfile()
    {
        return $this->belongsTo('App\UserProfile');
    }
}
