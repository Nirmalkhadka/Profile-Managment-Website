<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use Hash;
use Session;

class AdminLoginController extends Controller
{
    public function index(){
        return view('adminPages.adminlogin');
    }

    public function mainindex(){
        return view('adminPages.index');
    }

    public function Logout(Request $request){
        if (session()->has('adminloginId')) {
            // session()->pull('loginId');
            $request->session()->forget('adminloginId');
            return redirect('admin');
        } else {
            # code...
        }
        
    }


    public function adminloginUser(Request $request){
        $request->validate([
            
            'email'=>'required|email',
            'password'=>'required|min:8|max:12'
            

        ]);

        new AdminUser();
        
        $users = AdminUser::where('email','=',$request->email)->first();
        if($users){
            if(Hash::check($request->password,$users->password)){
                $request->session()->put('adminloginId',$users->profile_uid);
                
                return redirect()->route('adminindex');
                
                
                // return redirect('getStarted')->with(['users'=>$users]);
            }else{
                $request->session()->flash('notMatch','!!!Password does not match!!!');
                return redirect('/admin');
            }
        }else{
            $request->session()->flash('notRegister','!!!Email is not registered!!!');
            return redirect('/admin');
        }
    }


}
