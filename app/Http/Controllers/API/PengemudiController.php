<?php

namespace App\Http\Controllers\API;

use App\Models\Pengemudi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class PengemudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
            'owner_id' => 'required|integer',
            'harga' => 'required|integer'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }


        $pengemudi = Pengemudi::create([
            'user_id' => $request->user_id,
            'owner_id' => $request->owner_id,
            'harga' => $request->harga
            
         ]);

         return response()->json([
             "pengemudi" => $pengemudi
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengemudi = Pengemudi::with('user', 'owner', 'pengemudiTransaksi')->findOrFail($id);
        if (is_null($pengemudi)) {
            return response()->json('Data not found', 404); 
        }

        return response()->json($pengemudi, 200);
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
    public function update(Request $request, $pengemudi_id)
    {
        $validator = Validator::make($request->all(), 
        [
            'user_id' => 'required',
            'owner_id' => 'required',
            'harga' => 'required|int'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

     
        $pengemudi = Pengemudi::where('id',$pengemudi_id)->update([
            'user_id' => $request->user_id,
            'user_id' => $request->user_id,
            'owner_id' => $request->owner_id,
            'harga' => $request->harga
         ]);

         $pengemudi_data = Pengemudi::where('id',$id)->get();
         return response()->json([
             "pengemudi" => $pengemudi_data
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengemudi $pengemudi, $id)
    {
        $pengemudi = Pengemudi::findOrFail($id);
        if($pengemudi){
            $pengemudi->delete();
        }else{
            return response()->json("Data gagal di hapus");
        }
        

        return response()->json("Data berhasil dihapus");
    }
}
