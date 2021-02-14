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
use App\Products;
use App\Booking;


class UserProfileController extends Controller
{

    public function index()
    {
        //
        $id = Auth::id();
        $user = Auth::user();
        $words = explode(" ", $user->name);
        $acronym = "";


        return view('user.profile', compact('user', 'words', 'acronym'));
    }

    public function photo()
    {
        //
        $pagename = 'Upload Photo';

        return view('user.photo', compact('pagename'));
    }


    public function uploadPhoto(Request $request)
    {
        $user = Auth::user();

        if ($request->hasFile('img_photo')) {
            $filename = $request->img_photo->getClientOriginalName();

            // Save files to directory folder
            $request->img_photo->storeAs('/images', $filename, 'public_uploads');

            // Save name file to Database
            $user->punyaProfile->update([
                'img_photo' => $filename
            ]);
        }

        return redirect()->route('userprofile.index')->with('status', 'Photo Updated successfully');
    }

    public function show($id)
    {
        //
    }


    public function edit()
    {
       if(Auth::user()) {
           $user = User::find(Auth::user()->id);
           
           if($user) 
           {
               return view('user.edit')->withUser($user);
            } 
            else 
            {
                return redirect()->back();
            }
        }
        else 
            {
                return redirect()->back();
            }
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user) {

            $validatedData = $request->validate([
                'name' => 'required|min:3|max:255',
                'gender' => 'boolean',
            ]);

            if ($request->hasFile('img_photo')) {
                $filename = $request->img_photo->getClientOriginalName();
    
                // Save files to directory folder
                $request->img_photo->storeAs('/images', $filename, 'public_uploads');

                $user->name                 = $request->name;
                $user->punyaProfile->gender = $request->gender;
                $user->punyaProfile->phone = $request->phone;
                $user->punyaProfile->img_photo = $filename;

                $user->push();
                
                return redirect()->route('userprofile.index')->with('status', 'Profile Updated!');
                    
            } else {

                $user->name                 = $request->name;
                $user->punyaProfile->gender = $request->gender;
                $user->punyaProfile->phone = $request->phone;

                $user->push();
                
                return redirect()->route('userprofile.index')->with('status', 'Profile Updated!');

            }
        } 
        else 
        {
            return redirect()->back();
        }
        
    }

    /* ------ ACTIVATE JOIN SELLER---------- */

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
        if (!$userseller) {
            $seller = new Seller;

            $seller->user_id = $id;

            $seller->name = "My Store";

            $user->punyaSeller()->save($seller);

            return redirect()->route('signup-seller')->with('status', 'Item created successfully');
        } else {
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
        if (Auth::user()->password == null) {

            $validatedData = $request->validate([
                'new-password' => 'required|string|min:8|confirmed',
            ]);

            $user = Auth::user();
            $user->password = Hash::make($request->get('new-password'));
            $user->save();

            return redirect()->back()->with('status', "Password Berhasil diatur");
        } else {
            if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
                return redirect()->back()->with('error', "Password lama tidak esuai");
            }

            if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
                return redirect()->back()->with('error', "Password baru harus berbeda dari password lama");
            }

            $validatedData = $request->validate([
                'current-password' => 'required',
                'new-password' => 'required|string|min:8|confirmed',
            ]);

            $user = Auth::user();
            $user->password = bcrypt($request->get('new-password'));
            $user->save();

            return redirect()->back()->with('status', "Password berhasil diubah");
        }
    }



        /* ------ EDIT & UPDATE FUNCTION OPTIONAL ---------- */

        public function editUser()
        {
            //mengambil model User dengan di buat alias variabel $user
            $pagename = 'Edit Profile';
            $user = Auth::user();
            $userprofile = $user->punyaProfile;
    
            return view('user.edit', compact('user', 'userprofile', 'pagename'));
        }
    
    
        public function updateUser(Request $user)
        {
            $id = Auth::id();
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
    
            if ($user->hasFile('img_photo')) {
                $filename = $user->img_photo->getClientOriginalName();
    
                // Save files to directory folder
                $user->img_photo->storeAs('/images', $filename, 'public_uploads');
            }
    
    
    
            $user = User::findOrFail($id);
    
            $user->name                     = request('name');
            $user->punyaProfile->gender     = request('gender');
            $user->punyaProfile->phone      = request('phone'); //punyaProfile is function in User Model relation one to one
            
            if ($user->punyaProfile->img_photo)
            {
                $user->punyaProfile->img_photo  = request($filename);
            }
    
            //$user->push(); //For update data relational
            $user->push();
    
            return redirect()->route('userprofile.index')->with("status", "Profil berhasil diupdate.");
        }
}
