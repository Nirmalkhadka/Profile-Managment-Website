<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CodingSkills;
use App\Models\ProfessionalSkills;
use App\Models\ProfileEducation;
use App\Models\Profile;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function customindex($id){
        $customer = User::where('profile_uid','=',$id)->first();
        $customoerId = $id;
        // $customerCodingSkills = CodingSkills::where('profile_uid','=',$id)->get();
        // $customerProfSkills = ProfessionalSkills::where('profile_uid','=',$id)->get();
        // $customerEducations = ProfileEducation::where('profile_uid','=',$id)->get();
        // $customerProfile = Profile::where('profile_uid','=',$id)->first();
        if (is_null($customer)) {
            # code...
        }
        else {
            $data = compact('customoerId');
            // $Codingdata = compact('customerCodingSkills');
            // $Profdata = compact('customerProfSkills');
            // $Educationdata = compact('customerEducations');
            // $Profiledata = compact('customerProfile');
            return view('userhome')->with($data);
        }
        
    }
}
