<?php

namespace App\Http\Controllers\landingFrontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class SignUpCrontroler extends Controller
{
    public function index(){
        return view('landingFrontendPage.signup');
    }

    public function signupUser(Request $request){
        
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users|indisposable',
            'password'=>'required|min:8|max:12',
            'phone'=>'nullable|min:10|max:10',
            'image'=>'required|image|mimes:jpg,png,jpeg'

        ]);

        $filename = time().".pp.".$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('/images/UserprofilePic'),$filename);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->number = $request->number;
        $user->profilePic = $filename;
        $res = $user->save();
        // return "save";

        if ($res) {
            $request->session()->flash('success','You have register successfully');
            return view('landingFrontendPage.login');
            

        }else {
            $request->session()->flash('fail','Somthing went wrong');
            return view('landingFrontendPage.login');
           
        }
    }
}
