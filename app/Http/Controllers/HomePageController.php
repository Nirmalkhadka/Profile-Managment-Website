<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Profile;
use App\Models\User;
use App\Models\CodingSkills;
use App\Models\ProfessionalSkills;
use App\Models\ProfileEducation;

class HomePageController extends Controller
{
    public function index(){

        if (session()->has('loginId')) {
            $uid = session()->get('loginId');
        }

        $Codingskill = CodingSkills::where('profile_uid','=',$uid)->first();
        if ($Codingskill) {
            return redirect()->route('home');
        }
        else {
            return view('getStarted');
        }



        
    }

    public function Logout(Request $request){
        if (session()->has('loginId')) {
            // session()->pull('loginId');
            $request->session()->forget('loginId');
            return redirect('login');
        } else {
            # code...
        }
        
    }

    
    

    public function getStartedUser(Request $request){

            $request->validate([
                'youare'=>'required',
                'yourdesc'=>'required|max:3255',
                'inputs.*.skill'=> 'required',
                'skill.*' => 'required'
    
    
    
            ]);

            
    
            $profile = new Profile();
            $codingSkill = new CodingSkills();
            $profSkills = new ProfessionalSkills();
            
            $profileEducation = new ProfileEducation();
            // new User();
            if (session()->has('loginId')) {
                $uid = session()->get('loginId');
            }

            
            
            $profile->youAre = $request->youare;
            $profile->yourDesc = $request->yourdesc;
            $profile->profile_uid = $uid;



            // coding skill data

            $skills = $request->skill;
            $perCover = $request->perCover;
            $profileuid = $uid;
            

            for ($i=0; $i < count((array)$skills) ; $i++) { 
                $datasave = [
                    'skill' => $skills[$i],
                    'per_you_cover' => $perCover[$i],
                    'profile_uid' => $profileuid,
                ];

                $codingSkill->insert($datasave);
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

                $profSkills->insert($datasave);
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

                $profileEducation->insert($dataEducation);
            }


            $res=$profile->save();
            
    
            if ($res) {
    
                        
                        return redirect('home');
                        
            
            }else {
                        
                        return back();
                       
            }
    
        }
}
