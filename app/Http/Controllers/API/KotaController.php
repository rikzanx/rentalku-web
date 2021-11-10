<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KategoriKota;
use Illuminate\Http\Request;
use Validator;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = KategoriKota::all();

        return response()->json($jenis, 200);
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
            'name' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        $kategoriKota = KategoriKota::create([
            'name' =>$request->name
        ]);

        return response()->json([
            "kategori_jenis" => $kategoriKota
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
        //
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
            'name' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        $kategori = Kota::where('id', $id)->update([
            'name' => $request->name
        ]);

        $kategori_data = Kota::where('id', $id)->get();

        return response()->json([
            "kategori_kota" => $kategori_data
       ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = KategoriKota::findOrFail($id);
        if($kategori){
            $kategori->delete();
        }else{
            return response()->json("Data gagal di hapus");
        }
        

        return response()->json("Data berhasil dihapus");
    }
}
