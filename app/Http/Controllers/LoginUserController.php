<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginUserController extends Controller
{


    public function loginPost(Request $request){
      // dd('ok');
      // $hashedpass = bcrypt('ADM');
      // print_r($hashedpass);die();
      // $pw = 123456;
      //  $hashed = Hash::make($pw);
      //  print_r(Hash::check($pw, $hashed));die();
        $myusername = $request->username;
        $password = $request->password;

        $data = User::where('myusername',$myusername)->first();
        $programs=DB::connection('mysql2')->select("SELECT * FROM mcarduser WHERE myusername = '".$data->myusername."' ");
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->mypassword)){
                Session::put('myusername',$data->myusername);
                Session::put('idhomepage',$data->idhomepage);
                Session::put('noid',$data->noid);
                Session::put('page',[]);
                Session::put('login',TRUE);
                return redirect()->back();
                // return redirect('/');
            }
            else{
                return redirect('login')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('login')->with('alert','Password atau Email, Salah!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }

    public function register(Request $request){
        return view('register');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);

        $data =  new ModelUser();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('login')->with('alert-success','Kamu berhasil Register');
    }
}
