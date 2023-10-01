<?php

namespace App\Http\Controllers;
use Session;

use Illuminate\Http\Request;
use App\Mail\ContactMail;

use App\Models\Profile;
use App\Models\User;
use App\Models\CodingSkills;
use App\Models\ProfessionalSkills;
use App\Models\ProfileEducation;

use App\Models\ProjectAbout;
use App\Models\ProjectImages;
use App\Models\ProjectLanguages;

use App\Models\AdminUser;
use Mail;

class AdminController extends Controller
{
    public function users(){
        return view('adminPages.users');
    }

    public function adminUsers(){
        return view('adminPages.admin-user');
    }

    public function deletefromadmin($id){
        
        $customerProfile = Profile::find($id);
        if ($customerProfile) {
            $customerProfile->delete();
        }
        

        $customerCodingSkills = CodingSkills::find($id);
        if ($customerCodingSkills) {
            $customerCodingSkills->delete();
        }
        

        $customerProfSkills = ProfessionalSkills::find($id);
        if ($customerProfSkills) {
            $customerProfSkills->delete();
        }
        

        $customerEducations = ProfileEducation::find($id);
        if ($customerEducations) {
            $customerEducations->delete();
        }
       
        

        $ProjectImages = ProjectImages::find($id);
        if ($ProjectImages) {
            $ProjectImages->delete();
        }

        $ProjectLanguages = ProjectLanguages::find($id);
        if ($ProjectLanguages) {
            $ProjectLanguages->delete();
        }
        
        
        $projrctAbout = ProjectAbout::find($id);
        if ($projrctAbout) {
            $projrctAbout->delete();
        }
        
        
        $customer = User::find($id);
        if ($customer) {
            $customer->delete();
        }
        
        

        
        

        return redirect('/admin/index');
    }

    public function deleteinadmin($id){
        

        if ($id == session()->get('adminloginId')) {
            return back();
        }
        else {
            
            $AdminUser = AdminUser::find($id);
            if ($AdminUser) {
                $AdminUser->delete();
            }
            return back();
            
        }
        
    }

    public function contactemail($email , Request $request){

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Mail::to($email)->send(new ContactMail($details));
        return back()->with('message_sent','Your message has been sent successfully!');


    }
}
