<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dompet;
use Illuminate\Http\Request;
use Validator;

class DompetkuController extends Controller
{
    public function show($id)
    {

        $dompet = Dompet::with('user', 'transaksiDompet')->findOrFail($id);
        if(count([$dompet]) > 0){
            $response = [
                "status" => "success",
                "message" => 'Data Dompet Ditemukan',
                "errors" => null,
                "content" => $dompet,
            ];
            return response($response, 200);
        }else{
            $response = [
                "status" => "error",
                "message" => 'Data dompet Tidak Ditemukan',
                "errors" => null,
                "content" => $dompet,
            ];
            return response($response, 200);
    }
    }
    
    

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), 
        [
            'user_id' => 'required',
            'saldo' => 'required|int'
        ]);

        if($validator->fails())
        {
            $response = [
                "status" => "error",
                "message" => 'Kolom belum diisi',
                "errors" => $validator->errors(),
                "content" => null,
            ];
            return response()->json($response,200);
        }

     
        $dompet = Dompet::where('id',$id)->update([
            'user_id' => $request->user_id,
            'saldo' => $request->saldo
         ]);

        if ($dompet) {
            $dompet_data = Dompet::where('id',$id)->get();
            $response = [
                "status" => "success",
                "message" => 'Berhasil update dompet',
                "errors" => null,
                "content" => $dompet_data,
            ];  

            return response()->json($response, 200);
        }

        else {
            $response = [
                "status" => "gagal",
                "message" => 'gagal update artikel',
                "errors" => null,
                "content" => $dompet,
            ];

        return response()->json($response, 201);    
        }


         
    }
}
