<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\User;
use App\Role;
use App\UserProfile;
use App\Seller;
use App\Products;

class SellerController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::id();

        $user = User::find($id);

        $sellers = Seller::all();

        $sellerOwnUser = Seller::with('dipunyaiUser')->get();


        return view('seller.list', compact('sellers'));
    }


    public function ownPrductSeller()
    {
        $id = Auth::id();
        $sellers = User::find($id);
        
        return view('user.ownproduct', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products  = Products::all();
        $seller   = Seller::all();
        return view('seller.create', compact('products', 'seller'));
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
        $this->validate($request, [
            'name' => 'required|min:4|max:255',
        ]);

        $seller = new Seller;
        $seller->name      = request('name');
        $seller->save();

        return redirect()->route('seller.index')->with('success','You have success registration as seller ');
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

    public function edit()
    {
        //mengambil model User dengan di buat alias variabel $user
        $user = Auth::user();
    
        $userseller = $user->punyaSeller;

        return view('seller.edit', compact('user', 'userseller'));
    }

    public function update(Request $userseller)
    {
        $id = Auth::id();
        $user = Auth::user();
        
        $userseller = $user->punyaSeller;


        $user = User::find($id);
        $user->punyaSeller->name   = request('name'); //punyaProfile is function in User Model relation one to one

        //$user->push(); //For update data relational
        $user->push();

        return redirect()->back()->with("status", "Profil Toko berhasil diupdate.");
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
}
