<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\User;
use App\Role;
use App\UserProfile;


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
    public function create()
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
    public function store(Request $request)
    {
        //
        $user = Auth::user();

        if($request->hasFile('img_photo'))
        {
            $filename = $request->img_photo->getClientOriginalName();

            $request->img_photo->storeAs('/images', $filename, 'public');

            $user->punyaProfile->update([
                'img_photo' => $filename
            ]);
            
        }

        return redirect()->route('userprofile.index')->with('status','Item created successfully');
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
        //mengambil model User dengan di buat alias variabel $user
        $user = Auth::user();
        $userprofile = User::find($id)->punyaProfile;

        return view('user.edit', compact('user', 'userprofile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $user, $id)
    {
        // If Model User punya funtion "punyaprofile" masih kosong
        //if ($user->punyaProfile === NULL){
        //    $profile = new UserProfile;
        //    $profile->phone = request('phone');
        //    $user->punyaProfile()->save($profile);}
        
        $user = User::find($id);

        $user->name = request('name');
        $user->punyaProfile->gender = request('gender'); 
        $user->punyaProfile->phone = request('phone'); //punyaProfile is function in User Model relation one to one

        $user->push(); //For update data relational 
        
        return redirect()->back()->with("status","Profil berhasil diupdate.");
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

    /** Custom Code */

    public function changePassword()
    {
        return view('auth.passwords.change');
    }

    public function updatePassword(Request $request)
    {
        if(!(Hash::check($request->get('current-password'), Auth::user()->password)))
        {
            return redirect()->back()->with('error',"Password lama ngga pas");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0)
        {
            return redirect()->back()->with('error',"Password harus beda dengan password lama");
        }

        $validatedData = $request->validate([
            'current-password'=>'required',
            'new-password'=>'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password berhasil diubah");
    }


}
