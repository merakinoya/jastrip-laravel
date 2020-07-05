<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

use App\User;
use App\Seller;
use App\Products;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $products = Products::all();

        return view('product.list', ['productinhtml' => $products]);
        
        //return view('product.list', compact('products'));

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        $user = Auth::user();
        $sellerid = $user->punyaSeller->id;


        $this->validate($request, [
            'name' => 'required|min:4|max:255',
        ]);

        if ($request->hasFile('img'))
        {
            $filename = $request->img->getClientOriginalName();
            // Save files to directory folder
            $request->img->storeAs('/products', $filename, 'public');
        }

        $product = new Products;
        $product->seller_id = $sellerid;

        $product->name      = $request->name;
        $product->facility  = $request->facility;
        $product->start_at  = $request->start_at; 
        $product->finish_at = $request->finish_at;
        $product->price     = $request->price;
        $product->img       = $filename;
          
        $product->save();

        return redirect()->route('products.index')->with('success','Product created successfully.');
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
        $products = Products::find($id);
        return view('product.detail', ['product' => $products ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $product = Products::find($id);
        return view('product.edit', compact('product'));

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
        $product = Products::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'facility' => 'required'
        ]);
    
        if (!$request->hasFile('img'))
        {
            $filename = $request->img->getClientOriginalName();
            // Save files to directory folder
            $request->img->storeAs('/products', $filename, 'public');
        }

        $product->name      = $request->name;
        $product->facility  = $request->facility;
        $product->start_at  = $request->start_at; 
        $product->finish_at = $request->finish_at;
        $product->price     = $request->price;
        $product->img       = $filename;
          
        $product->save();

        return redirect()->route('products.index')->with("status", "Berhasil di Update");

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
