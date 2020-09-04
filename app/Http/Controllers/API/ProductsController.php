<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Products;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Products::all();

        return response()->json([
            "message" => "This is your data",
            "products" => $products
        ], 200);
    }


    public function show($id)
    {
        $product = Products::find($id);
            
        return response()->json([
            "message" => "This is your data",
            "product" => $product
        ], 200);
    }


    public function create(Request $request)
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

        return response()->json(["message" => "Berhasil Buat Seller"], 201);
    }


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
        
        return response()->json([
            "message" => "Data Terupdate",
            "data" => $product
        ], 200);
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
