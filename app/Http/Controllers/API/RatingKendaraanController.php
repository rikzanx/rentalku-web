<?php

namespace App\Http\Controllers\API;

use Validator;
use Illuminate\Http\Request;
use App\Models\RatingKendaraan;
use App\Http\Controllers\Controller;
use App\Models\RatingUser;

class RatingKendaraanController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'user_id' => 'required|integer',
            'kendaraan_id' => 'required|integer',
            'jumlah_bintang' => 'required|integer',
            'review' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }


        $rating = RatingKendaraan::create([
            'user_id' => $request->user_id,
            'kendaraan_id' => $request->kendaraan_id,
            'jumlah_bintang' => $request->jumlah_bintang,
            'review' => $request->review
            
         ]);

         return response()->json($rating,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kendaraan_id)
    {
        $rating = RatingKendaraan::where('kendaraan_id', $kendaraan_id)->with('user','kendaraan')->get();

        return response($rating, 200);
    }

    public function showId($rating_id)
    {
        $rating = RatingKendaraan::where('rating_id', $rating_id)->with('user','kendaraan')->get();
        
        return response($rating, 200);
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
        $validator = Validator::make($request->all(), 
        [
            'user_id' => 'required|integer',
            'kendaraan_id' => 'required|integer',
            'jumlah_bintang' => 'required|integer',
            'review' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }


        $rating = RatingKendaraan::where('id',$id)->update([
            'user_id' => $request->user_id,
            'kendaraan_id' => $request->kendaraan_id,
            'jumlah_bintang' => $request->jumlah_bintang,
            'review' => $request->review
            
         ]);

         $ratingData = RatingKendaraan::where('id', $id)->get();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rating = RatingKendaraan::findOrFail($id);
        if($rating){
            $rating->delete();
        }else{
            return response()->json("Data gagal di hapus");
        }
        

        return response()->json("Data berhasil dihapus");
    }
}
