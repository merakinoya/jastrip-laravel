<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

use App\User;
use App\Role;
use App\UserProfile;
use App\Seller;


class UserProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function photo()
    {
        //
        return view('user.photo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadPhoto(Request $request)
    {
        //
        $user = Auth::user();

        if ($request->hasFile('img_photo')) {
            $filename = $request->img_photo->getClientOriginalName();

            // Save files to directory folder
            $request->img_photo->storeAs('/images', $filename, 'public');

            // Save name file to Database
            $user->punyaProfile->update([
                'img_photo' => $filename
            ]);
        }

        return redirect()->route('userprofile.index')->with('status', 'Item created successfully');
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
    public function edit()
    {
        //mengambil model User dengan di buat alias variabel $user
        $user = Auth::user();
        $userprofile = $user->punyaProfile;

        return view('user.edit', compact('user', 'userprofile'));
    }


    public function update(Request $user, $id)
    {
        $user = Auth::user();
        $userprofile = $user->punyaProfile;

        //If tidak punya funtion "punyaprofile" / masih kosong
        if (!$userprofile) {
            $profile = new UserProfile;

            $profile->user_id = $id;

            $profile->gender = request('gender');
            $profile->phone = request('phone');

            $user->punyaProfile()->save($profile);
        }

        $user = User::find($id);

        $user->name                   = request('name');
        $user->punyaProfile->gender   = request('gender');
        $user->punyaProfile->phone    = request('phone'); //punyaProfile is function in User Model relation one to one

        //$user->push(); //For update data relational
        $user->push();

        return redirect()->back()->with("status", "Profil berhasil diupdate.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function signupSeller()
    {
        //
        return view('seller.activate');
    }


    public function activateSeller()
    {
        $user = Auth::user();
        $id = Auth::id();
        $userseller = $user->punyaSeller;

        //If tidak punya funtion "punyaprofile" / masih kosong
        if (!$userseller) 
        {
            $seller = new Seller;

            $seller->user_id = $id;

            $seller->name = 'This Is Name Seller';

            $user->punyaSeller()->save($seller);

            return redirect()->route('signup-seller')->with('status', 'Item created successfully');
        } 
        else 
        {
            $user = Auth::user();
            $userseller = $user->punyaSeller;
            
            return view('seller.activate', compact('user'));
        }
    }



    /** Custom Code */

    public function changePassword()
    {
        return view('auth.passwords.change');
    }

    public function updatePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with('error', "Password lama ngga pas");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with('error', "Password harus beda dengan password lama");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success", "Password berhasil diubah");
    }
}
