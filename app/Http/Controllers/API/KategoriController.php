<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();

        return response()->json($kategori, 200);
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

        $kategori = Kategori::create([
            'name' =>$request->name
        ]);
        $response = [
            "data" => $kategori,
            "status" => "success",
            "meesage"  => "Data Success created"
        ];
        return response()->json($response,201);
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

        $kategori = Kategori::where('id', $id)->update([
            'name' => $request->name
        ]);

        $kategori_data = Kategori::where('id', $id)->get();

        return response()->json($kategori_data,201);
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        if($kategori){
            $kategori->delete();
        }else{
            $response = [
                "status" => "success",
                "message" => "Data berhasil dihapus"
            ];
            return response()->json("Data gagal di hapus");
        }

        $response = [
            "status" => "success",
            "message" => "Data berhasil dihapus"
        ];
        return response()->json($response);
    }

}


