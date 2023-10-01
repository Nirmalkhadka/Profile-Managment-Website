<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Hash;

use Illuminate\Http\Request;

class AdminAddUserController extends Controller
{
    public function index(){
        return view('adminPages.add-admin-user');
    }

    public function addAdminUser(Request $request){
        
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required|email|unique:users|indisposable',
        //     'password'=>'required|min:8|max:12',
        //     'number'=>'nullable|min:10|max:10',
        //     'profilePic'=>'required|image|mimes:jpg,png,jpeg'

        // ]);

        $filename = time().".pp.".$request->file('adminprofile')->getClientOriginalExtension();
        $request->file('adminprofile')->move(public_path('/images/AdminProfilePic'),$filename);

        $user = new AdminUser();
        $user->name = $request->adminfullname;
        $user->email = $request->adminmail;
        $user->password = Hash::make($request->adminpassword);
        $user->number = $request->adminnumber;
        $user->profilePic = $filename;
        $res = $user->save();
        // return "save";

        if ($res) {
            
            return view('adminPages.index');
            

        }else {
            // $request->session()->flash('fail','Somthing went wrong');
            return back();
           
        }
    }
}
