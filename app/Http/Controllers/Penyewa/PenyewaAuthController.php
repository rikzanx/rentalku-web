<?php

namespace App\Http\Controllers\Penyewa;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PenyewaAuthController extends Controller
{

    public function index()
    {
        return view('penyewa.auth.login');
    }  
      

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->with('status','Login details are not valid');
    }



    public function registration()
    {
        return view('penyewa.auth.register');
    }
      

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
           
            return redirect("dashboard")->withSuccess('You have signed-in');
        }

        return redirect("login")->with('status','Gagal Mendaftar');
        
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    

    public function dashboard()
    {
        if(Auth::check()){
            return view('penyewa.dashboard');
        }
  
        return redirect("login")->with('status','You are not allowed to access');
    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}