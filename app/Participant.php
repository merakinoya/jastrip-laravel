<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'booking_id',

        'name',  
        'birth_date',

        'type', 
        'card_id',  
    ];

    public function dipunyaiBooking()
    {
        return $this->belongsTo('App\Booking', 'booking_id');
    }

}
