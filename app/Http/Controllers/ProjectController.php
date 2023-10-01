<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProjectAbout;
use App\Models\ProjectImages;
use App\Models\ProjectLanguages;
use Session;

class ProjectController extends Controller
{
    public function index(){
        return view('/projects');
    }

    public function viewProject($id,$pid){
        $data = compact('id');
        $pdata = compact('pid');
        return view('/singleProject')->with($pdata);
    }

    public function userviewProject($id,$pid){
        $userid = compact('id');
        $userpid = compact('pid');
        return view('/userSingleProject')->with($userid)->with($userpid);
    }

    public function editProject($id,$pid){
        $userid = compact('id');
        $userpid = compact('pid');
        return view('/editProject')->with($userid)->with($userpid);
    }


    public function editProjectcontrol($id, $pid, Request $request){

       
       $projectAbout = ProjectAbout::where('profile_uid','=',$id)->where('projectId','=',$pid)->first();
       $projectLanguages = ProjectLanguages::where('profile_uid','=',$id)->where('projectId','=',$pid)->get();

       $projectAbout->title = $request->projecttitle;
       $projectAbout->projectDesc = $request->projectdesc;
       $projectAbout->projectLink = $request->link;
       $projectAbout->profile_uid = $id;
       $projectAbout->save();


    //    languages update

        $languages = $request->language;
        $projectLanguages = ProjectLanguages::where('profile_uid','=',$id)->where('projectId','=',$pid)->delete();

        for ($i=0; $i < count((array)$languages) ; $i++) { 
            $datasave = [
                'projectLanguage' => $languages[$i],
                'profile_uid' => $id,
                'projectId' => $pid,
            ];

            // $projectLanguages->delete($datasave);
            
            ProjectLanguages::insert($datasave);
        }



        // images update

        $projectImages = ProjectImages::where('profile_uid','=',$id)->where('projectId','=',$pid)->get();

        if ($request->hasFile('images')) {
            $projectImages = ProjectImages::where('profile_uid','=',$id)->where('projectId','=',$pid)->delete();

            foreach ($request->file('images') as $image) {
                $filename = $image->getClientOriginalName();
                $image->move(public_path('/images/ProjectImages'),$filename); // Change the storage path as needed
    
                $images = [
                    'projectImage' => $filename,
                    'profile_uid' => $id,
                    'projectId' => $pid,
                ];

                ProjectImages::insert($images);
            }


        }

        return redirect('projects');


    }





    public function addProject(){
        return view('/addProject');
    }

    public function addProjectDetails(Request $request){

        // $request->validate([
        //     'title'=>'required',
        //     'projectdesc'=>'required',
        //     'images'=> 'required|image|mimes:jpg,png,jpeg',



        // ]);

        $projectAbout = new ProjectAbout();
        $projectImages = new ProjectImages();
        $projectLanguages = new ProjectLanguages();

        if (session()->has('loginId')) {
            $uid = session()->get('loginId');
        }


        // profile about data save

        $projectAbout->title = $request->projecttitle;
        $projectAbout->projectDesc = $request->projectdesc;
        $projectAbout->projectLink = $request->link;
        $projectAbout->profile_uid = $uid;
        $projectAbout->save();



        $project = ProjectAbout::where('profile_uid','=',$uid)->latest('projectId')->first();
        $project_ID = $project->projectId;
        


        // project languages data save

        $languages = $request->language;
        $profileuid = $uid;

        
            

            for ($i=0; $i < count((array)$languages) ; $i++) { 
                $datasave = [
                    'projectLanguage' => $languages[$i],
                    'profile_uid' => $profileuid,
                    'projectId' => $project_ID,
                ];

                $projectLanguages->insert($datasave);
            }



            // project images data save

        
            foreach ($request->file('images') as $image) {
                $filename = time().".".$image->getClientOriginalName();
                $image->move(public_path('/images/ProjectImages'),$filename); // Change the storage path as needed
    
                $images = [
                    'projectImage' => $filename,
                    'profile_uid' => $profileuid,
                    'projectId' => $project_ID,
                ];

                ProjectImages::insert($images);
            }
        
    
            return redirect('projects');

    }


    // delete project

    public function deleteProject($id,$pid){

        $projectAbout = new ProjectAbout();
        $projectImages = new ProjectImages();
        $projectLanguages = new ProjectLanguages();


        $projectImages = ProjectImages::where('profile_uid','=',$id)->where('projectId','=',$pid)->delete();
        $projectLanguages = ProjectLanguages::where('profile_uid','=',$id)->where('projectId','=',$pid)->delete();
        $projectAbout = ProjectAbout::where('profile_uid','=',$id)->where('projectId','=',$pid)->delete();

        return redirect('projects');

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
            return view('/userProjects')->with($data);
        }
        
    }
}
