<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index(){
        return view('user.profile');
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'image_link' => 'required|image:jpeg,png,jpg,gif,svg|max:2048',
            'nik' => 'required|integer',
            'foto_ktp' => 'required|integer',
            'foto_sim' => 'required|integer',
            'alamat' => 'required|integer',
            'kota' => 'required|integer',
            'telp' => 'required|integer',
            'lat' => 'required|integer',
            'long' => 'required|integer'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        $uploadFolder = "image/profile/";
        $image = $request->file('image_link');
        $imageName = time().'-'.$image->getClientOriginalName();
        $image->move(public_path($uploadFolder), $imageName);
        $image_link = $uploadFolder.$imageName;

        $profile = User::where('id',$id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'nik' => $request->email,
            'image_link' => $image_link,
            'nik' => $request->nik,
            'foto_ktp' => $request->foto_ktp,
            'foto_sim' => $request->foto_sim,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'telp' => $request->telp,
            'lat' => $request->lat,
            'long' => $request->long,
        ]);

        $userData = User::where('id', $id)->get();

        return response()->json([
            "profil" => $userData,
            "image_link" => URL::to($image_link)
        ], 201);
    }
}
