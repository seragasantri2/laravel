<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $data = User::where('email',$request->email)->firstOrFail();
        // dd($data->email);
        if($data){
            if(Hash::check($request->password, $data->password)){
                return redirect('/dashboard');
            }
        }
    }
    
}
