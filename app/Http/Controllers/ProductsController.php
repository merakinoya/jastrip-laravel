<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

use App\User;
use App\Seller;
use App\Products;

class ProductsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename = 'Trips';

        $products = Products::latest()->paginate(9);

        return view('product.list', compact('products', 'pagename'));
        //return view('product.list', compact('products'));
    }

    public function show($id)
    {
        //
        $products = Products::findOrFail($id);
        return view('product.detail', ['product' => $products]);
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
        return view('product.create', compact('products', 'seller'));
    }

    public function store(Request $request)
    {
        $id = Auth::id();
        $user = Auth::user();
        $sellerid = $user->punyaSeller->id;

        $request->validate([
            'name'              => 'required|min:4|max:255',
            'description'       => 'required|min:4',
            'price'             => 'required',
            'total_participant' => 'required',

            'start_at'          => 'required|date|after:tomorrow',
            'finish_at'         => 'required|date|after:start_at',

            'meet_point'        => 'required',
            'facility'          => 'required',
            'terms_condition'   => 'required',
            'img'               => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8048|file',
        ]);
        

        if ($request->hasFile('img')) {
            $filename = $request->img->getClientOriginalName();
            // Save files to directory folder
            $request->img->storePubliclyAs('/products', $filename, 'public_uploads');
        }

        $product = new Products;
        $product->seller_id = $sellerid;
        $product->user_id          = $id;
        $product->userprofile_id   = $id;

        $product->name              = $request->name;
        $product->description       = $request->description;
        $product->price             = $request->price;
        $product->total_participant = $request->total_participant;

        $product->start_at          = $request->start_at;
        $product->finish_at         = $request->finish_at;

        $product->meet_point        = $request->meet_point;
        $product->facility          = $request->facility;
        $product->terms_condition   = $request->terms_condition;

        $product->img               = $filename;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


    /** UPDATE PRODUCT FUNCTION 
     */
    public function edit($id)
    {
        $pagename = 'Edit Trips';
        $product = Products::findOrFail($id);
        return view('product.edit', compact('product', 'pagename'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name'              => 'required|min:4|max:255',
            'description'       => 'required|min:4',
            'price'             => 'required',
            'total_participant' => 'required',

            'start_at'          => 'required|date|after:tomorrow',
            'finish_at'         => 'required|date|after:start_at',

            'meet_point'        => 'required',
            'facility'          => 'required',
            'terms_condition'   => 'required',
            'img'               => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8048|file',
        ]);

        $product = Products::findOrFail($id);

        if ($request->hasFile('img')) {
            $filename = $request->img->getClientOriginalName();
            // Save files to directory folder
            $request->img->storeAs('/products', $filename, 'public_uploads');
        }

        $product->name              = $request->name;
        $product->description       = $request->description;
        $product->price             = $request->price;
        $product->total_participant = $request->total_participant;

        $product->start_at          = $request->start_at;
        $product->finish_at         = $request->finish_at;

        $product->meet_point        = $request->meet_point;
        $product->facility          = $request->facility;
        $product->terms_condition   = $request->terms_condition;

        if ($request->img) {
            $product->img = $filename;
        }

        //Save Action
        $product->push();

        return redirect()->route('userprofile.index')->with("status", "Produk Berhasil di Update");
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
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('userprofile.index')->with('status', 'Produk Berhasil Dihapus!');
    }
}
