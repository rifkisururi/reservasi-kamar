<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function login_action(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = DB::table('user')->where('email',$email)->first();

        if($data){

            if(Hash::check($password,$data->password)){

                Session::put('id',$data->id);
                Session::put('username',$data->username);
                Session::put('role',$data->role);
                Session::put('login',TRUE);

                if($data->role=='pengguna'){
                    return redirect('/pesan_kamar');
                }

                else{
                    return redirect('/admin/manajemen_kamar');
                }

            }

            else{

                return redirect('/login')->with('error','Email / password anda salah !');

            }

        }

        else{

            return redirect('/login')->with('error','Email / password anda salah !');

        }

    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_action(Request $request){

        DB::table('user')->insert([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'email'=>$request->email,
            'role'=>'pengguna',
            'password'=>Hash::make($request->password)
        ]);

        return redirect('/login')->with('success','Selamat anda berhasil melakukan pendaftaran, silahkan login');

    }

    public function logout(Request $request){

        $request->session()->forget('username');
        $request->session()->forget('id');
        $request->session()->forget('login');
        $request->session()->forget('role');
        $request->session()->flush();
        
        return redirect('/login')->with('success','Anda berhasil logout !');

    }

}