<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Transaksi;
use App\Models\TransaksiDompet;
use Validator;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::get();

        return response()->json($transaksi, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'waktu_ambil' => 'required',
            'durasi' => 'required'
            
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        

        $kendaraan = Kendaraan::where('id', $request->kendaraan_id)->first();

        $saldo = TransaksiDompet::where('user_id', $request->user_id)->groupBy('user_id')->sum('jumlah');
      
        

        $hargaTotal = $kendaraan['harga'] * $request->durasi;

        if ($saldo >= $hargaTotal) {
            $transaksi = Transaksi::create($request->all());

            return response()->json($transaksi,201);
        }

        else {
            return response()->json("Gagal", 200);
        }
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $transaksi = Transaksi::where('user_id', $user_id)->get();

        return response($transaksi, 200);
    }

    public function showId($transaksi_id)
    {
        $transaksi = Transaksi::where('id', $transaksi_id)->get();

        return response($transaksi, 200);
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
            'waktu_ambil' => 'required',
            'durasi' => 'required',
            'denda' => 'required',
            'status' => 'required',
            'lat' => 'required',
            'long' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        $transaksi = Transaksi::where('id', $id)->update([
            'user_id' => $request->user_id,
            'kendaraan_id' => $request->kendaraan_id,
            'waktu_ambil' => $request->waktu_ambil,
            'durasi' => $request->durasi,
            'denda' => $request->denda,
            'status' => $request->status,
            'lat' => $request->lat,
            'long' => $request->long
        ]);

        $transaksiData = Transaksi::where('id', $id)->get();

        

         return response()->json($transaksiData,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        if($transaksi){
            $transaksi->delete();
        }else{
            return response()->json("Data gagal di hapus");
        }
        

        return response()->json("Data berhasil dihapus");
    }

    
}