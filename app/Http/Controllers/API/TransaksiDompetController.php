<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TransaksiDompet;
use Illuminate\Http\Request;
use Validator;

class TransaksiDompetController extends Controller
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
            'dompet_id' => 'required|integer',
            'name' => 'required',
            'jumlah' => 'required',
            'kode_unik' => 'required',
            'bank' => 'required',
            'no_rek' => 'required',
            'status' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }


        $transaksiDompet = TransaksiDompet::create([
            'user_id' => $request->user_id,
            'dompet_id' => $request->dompet_id,
            'name' => $request->name,
            'jumlah' => $request->jumlah,
            'kode_unik' => $request->kode_unik,
            'bank' => $request->bank,
            'no_rek' => $request->no_rek,
            'status' => $request->status
            
         ]);

         return response()->json([
             "transaksi_dompet" => $transaksiDompet
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
        $transaksiDompet = TransaksiDompet::with('user', 'dompet')->findOrFail($id);
        if (is_null($transaksiDompet)) {
            return response()->json('Data not found', 404); 
        }

        return response()->json($transaksiDompet, 200);
    }

    public function saldoDompet($user_id)
    {
        
        $cek = TransaksiDompet::where('user_id', $user_id)->first();
       
        if($cek!= null){
            $dompet = TransaksiDompet::where('user_id', $user_id)
            ->selectRaw("SUM(jumlah) as jumlah")->groupBy('user_id')->with('user','dompet')
            ->get();
            return response()->json($dompet, 200);
        }
        $response =Array(
            Array(
                "jumlah" => 0
            )
        );
        return response()->json($response, 200);
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
            'dompet_id' => 'required|integer',
            'name' => 'required',
            'jumlah' => 'required',
            'kode_unik' => 'required',
            'bank' => 'required',
            'no_rek' => 'required',
            'status' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        $transaksiDompet = TransaksiDompet::where('id',$id)->update([
            'user_id' => $request->user_id,
            'dompet_id' => $request->dompet_id,
            'name' => $request->name,
            'jumlah' => $request->jumlah,
            'kode_unik' => $request->kode_unik,
            'bank' => $request->bank,
            'no_rek' => $request->no_rek,
            'status' => $request->status
        ]);

        $transaksiDompetData = TransaksiDompet::where('id', $id)->get();
     
         return response()->json([
             "transaksi_dompet" => $transaksiDompetData
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiDompet $transaksiDompet,$id)
    {
        $transaksiDompet = TransaksiDompet::first($id);
        if($transaksiDompet){
            $transaksiDompet->delete();
        }else{
            return response()->json("Data gagal di hapus");
        }
        

        return response()->json("Data berhasil dihapus");
    }
}
