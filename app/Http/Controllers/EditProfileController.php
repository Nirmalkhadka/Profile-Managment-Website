<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CodingSkills;
use App\Models\ProfessionalSkills;
use App\Models\ProfileEducation;
use App\Models\Profile;

class EditProfileController extends Controller
{
    public function edit($id){
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
            return view('editProfile')->with($data);
        }
        
    }

    public function editProfiles($profile_uid, Request $request){


        $request->validate([
            
            
            'phone'=>'nullable|min:10|max:10'

        ]);

        if (session()->has('loginId')) {
            $uid = session()->get('loginId');
        }

        

        $user = User::find($uid);
        $profile = Profile::find($uid);
        $customerEducations = ProfileEducation::find($uid);
        $customerProfSkills = ProfessionalSkills::find($uid);
        $customerCodingSkills = CodingSkills::find($uid);


        

        // user data update

        $user->name = $request->name;
        
        $user->number = $request->number;

        if ($request->hasFile('images')) {

            $filename = time().".".$request->file('images')->getClientOriginalName();
            $request->file('images')->move(public_path('/images/UserprofilePic'),$filename);
            $user->profilePic = $filename;
        }
        

        // profile data save

        $profile->youAre = $request->youare;
        $profile->yourDesc = $request->yourdesc;
        $profile->save();

        // coding skill data save

        $skills = $request->skill;
        $perCover = $request->perCover;
        $profileuid = $uid;
            

            for ($i=0; $i < count((array)$skills) ; $i++) { 
                $datasave = [
                    'skill' => $skills[$i],
                    'per_you_cover' => $perCover[$i],
                    'profile_uid' => $profileuid,
                ];
                $customerCodingSkills->delete($datasave);
                $customerCodingSkills->insert($datasave);
            }

        
        // Professional skill data

        $pskills = $request->pskill;
        $pperCover = $request->pperCover;
        
        

        for ($j=0; $j < count((array)$pskills) ; $j++) { 
            $datasave = [
                'skill' => $pskills[$j],
                'per_you_cover' => $pperCover[$j],
                'profile_uid' => $profileuid,
            ];

            $customerProfSkills->delete($datasave);
            $customerProfSkills->insert($datasave);
        }

        // education data

        $degreeName = $request->degreeName;
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $instutionName = $request->instutionName;
        $majorSubject = $request->majorSubject;

        for ($i=0; $i < count((array)$degreeName); $i++) { 
            $dataEducation = [
                'degree_name' => $degreeName[$i],
                'start_date' => $startDate[$i],
                'end_date' => $endDate[$i],
                'instution_name' => $instutionName[$i],
                'major_subject' => $majorSubject[$i],
                'profile_uid' => $profileuid,
                
            ];

            $customerEducations->delete($dataEducation);
            $customerEducations->insert($dataEducation);
        }


        $res = $user->save();

        if ($res) {
            return redirect('home');
        }
        else {
            return back();
        }


        
    }
}
