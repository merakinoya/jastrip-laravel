<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use DateTime;

use App\User;
use App\Seller;
use App\Products;
use App\Booking;
use App\Participant;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Products::findOrFail($id);
        return view('booking.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        
     /*   Validate Data
        $request->validate([

            'checkin_date'          => 'nullable',
            'participant_amount'    => 'required',
            'notes'                 => 'nullable',
    
            'price_amount'          => 'required',
            'expired_at'            => 'required',
    
            'receipt'               => 'nullable',
            'paid_at'               => 'nullable|date',
    
            'reason'                => 'nullable',
            'canceled_at'           => 'nullable|date',
        ]);
    */

        $user_id = Auth::id();

        $datetime = new DateTime('tomorrow');

        $datetime_tommorow = Carbon::now(env("APP_TIMEZONE"))->add(1, 'day');


        $booking = Booking::create([
            'user_id'               => $user_id,
            'userprofile_id'        => $user_id,
            'product_id'            => $id,

            'participant_amount'    => $request->participant_amount,
            'notes'                 => $request->notes, 

            'price_amount'          => $request->price_amount,
            'expired_at'            => $datetime_tommorow,
        ]);

        // Add relation to UserProfile

        $tenantName = $request->tenant_name;

        foreach($tenantName as $getdata => $name)
        {
            //$participant = new Participant;
            //$participant->name = $name;
            //$participant->save();

            $selected[] = new Participant(
                ['name' => $name]
            );
        };


        $booking->punyaParticipant()->saveMany($selected);
        
        return redirect()->route('userprofile.index')->with('success', 'Booking created successfully.');



        /* Eloqunt Inser data using "new User" method
         $booking = new Booking;
         $booking->name = $request->name;
         $booking->save();
        }
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('userprofile.index')->with('status', 'Booking Dihapus!');
    }


    public function cancelBooking(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        
        $datetime_canceled = Carbon::now(env("APP_TIMEZONE"));
        
        $booking->reason = $request->reason;
        $booking->canceled_at = $datetime_canceled;

        //Update Action
        $booking->push();

        return redirect()->route('userprofile.index')->with('status', 'Booking Dibatalkan!');
    }
}
