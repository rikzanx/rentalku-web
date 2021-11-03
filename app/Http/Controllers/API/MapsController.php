<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class MapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addressToLat(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'alamat' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }



         return response()->json([
             "lat" => "30000",
             "long" => "40000"
        ],200);
    }
    
    
    public function latToAddress(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'lat' => 'required',
            'long' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }



         return response()->json([
             "address" => "Jalan. Kuy"
        ],200);
    }

    public function kendaraanTrack($id)
    {
    
        return response()->json([
            "lat" => "300000",
            "long" => "500000"
       ],200);
    }
}
