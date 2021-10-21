<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'user_id',  
        'userprofile_id',  
        'product_id',  
        
        'checkin_date',
        'participant_amount', 
        'notes',

        'price_amount',
        'expired_at', 

        'receipt',
        'paid_at',

        'reason',  
        'canceled_at',
    ];
    

    public function dipunyaiUser()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function dipunyaiUserProfile()
    {
        return $this->belongsTo('App\UserProfile', 'userprofile_id');
    }

    public function dipunyaiProduct()
    {
        return $this->belongsTo('App\Products', 'product_id');
    }


    public function punyaParticipant()
    {
        return $this->hasMany('App\Participant','booking_id','id');
    }

}
