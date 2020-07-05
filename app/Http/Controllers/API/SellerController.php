<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Seller;

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
        return Seller::all();
    }


    public function show($id)
    {
        //
            $seller = Seller::find($id);
            
            return response()->json([
                "message" => "This is your data",
                "data" => $seller
            ], 200);
        
    }

    public function create(Request $request)
    {
        $seller = new Seller;
        $seller->name = $request->name;
        $seller->save();

        return response()->json(["message" => "Berhasil Buat Seller"], 201);

        //return Seller::create($request->all());
    }

    public function update(Request $request, $id)
    {
        //
        $seller = Seller::find($id);
        $seller->name = $request->name;
        $seller->save();

        return response()->json([
            "message" => "Data Terupdate",
            "data" => $seller
        ], 200);
    }

    public function delete(Request $request, $id)
    {
        //

        $seller = Seller::findOrFail($id);
        $seller->delete();

        return response()->json([
            "message" => "Deleted",
            "data" => $seller
        ], 200);
    }
}
