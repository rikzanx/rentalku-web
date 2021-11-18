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
      

        $jumlah = $kendaraan['harga'] * $request->durasi;
     
        if ($saldo >= $jumlah) {
            //jika saldo cukup
            $dompet = TransaksiDompet::create([
                "user_id" => $request->user_id,
                "dompet_id" => $request->user_id,
                "name" => 'Pembayaran',
                "jumlah" => (-1 * $jumlah),
                "kode_unik" => 0,
                "bank" => null,
                "no_rek" => null,
                "status" => 'Berhasil'

            ]);
            $transaksi = Transaksi::create($request->all());
            $transaksi['dompet'] = $dompet;
            $response = [
                "status" => "success",
                "message" => 'Berhasil dibuat',
                "errors" => null,
                "content" => $transaksi,
            ];

            return response()->json($response,201);
        }

        else {
            $response = [
                "status" => "error",
                "message" => 'Saldo tidak cukup',
                "errors" => null,
                "content" => null,
            ];
            return response()->json($response, 200);
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
        $transaksi = Transaksi::where('user_id', $user_id)->with('user','kendaraan','pengemudiTransaksi')->get();
        
        return response($transaksi, 200);
    }

    public function showId($transaksi_id)
    {
        $transaksi = Transaksi::where('id', $transaksi_id)->with('user','kendaraan','pengemudiTransaksi')->get();

        if(count($transaksi) > 0){
            $response = [
                "status" => "success",
                "message" => 'Data Transaksi Ditemukan',
                "errors" => null,
                "content" => $transaksi,
            ];
            return response($response, 200);
        }else{
            $response = [
                "status" => "error",
                "message" => 'Data Transaksi Tidak Ditemukan',
                "errors" => null,
                "content" => $transaksi,
            ];
            return response($response, 200);

        }
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
            $response = [
                "status" => "error",
                "message" => 'Validator Error',
                "errors" => $validator->errors(),
                "content" => null,
            ];
            return response()->json($response);
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
