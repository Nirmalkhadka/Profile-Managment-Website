<?php

namespace App\Http\Controllers\landingFrontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CodingSkills;
use Hash;
use Session;

class SignInCrontroler extends Controller
{
    public function index(){
        return view('landingFrontendPage.login');
    }

    public function loginUser(Request $request){
        $request->validate([
            
            'email'=>'required|email',
            'password'=>'required|min:8|max:12'
            

        ]);

        new User();
        new CodingSkills();
        $users = User::where('email','=',$request->email)->first();
        if($users){
            if(Hash::check($request->password,$users->password)){
                $request->session()->put('loginId',$users->profile_uid);
                $Codingskill = CodingSkills::where('profile_uid','=',$users->profile_uid)->first();
                if ($Codingskill) {

                    if (isset($request->remember) && !empty($request->remember)) {
                        setcookie("email",$request->email);
                        setcookie("password",$request->password);
                    }
                    else {
                        setcookie("email","");
                        setcookie("password","");
                    }
                    return redirect()->route('home');
                }
                else {
                    return redirect()->route('getStarted');
                }
                
                // return redirect('getStarted')->with(['users'=>$users]);
            }else{
                $request->session()->flash('notMatch','!!!Password does not match!!!');
                return view('landingFrontendPage.login');
            }
        }else{
            $request->session()->flash('notRegister','!!!Email is not registered!!!');
            return view('landingFrontendPage.login');
        }
    }
}
