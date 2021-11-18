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
        if (is_null($dompet)) {
            return response()->json('Data not found', 404); 
        }

        return response()->json($dompet, 200);
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
            return response()->json($validator->errors());
        }

     
        $pengemudi = Dompet::where('id',$id)->update([
            'user_id' => $request->user_id,
            'saldo' => $request->saldo
         ]);

         $dompet_data = Dompet::where('id',$id)->get();
         return response()->json([
             "dompet" => $dompet_data
        ],201);
    }
}
