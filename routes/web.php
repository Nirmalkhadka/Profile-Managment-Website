<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landingFrontend\HomeCrontroler;
use App\Http\Controllers\landingFrontend\SignInCrontroler;
use App\Http\Controllers\landingFrontend\SignUpCrontroler;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GetStartedCrontroller;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminAddUserController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeCrontroler::class,'index'])->middleware('alreadyLoggedIn');
Route::get('/login',[SignInCrontroler::class,'index'])->middleware('alreadyLoggedIn');
Route::get('/signup',[SignUpCrontroler::class,'index'])->middleware('alreadyLoggedIn');
Route::post('/signup-user',[SignUpCrontroler::class,'signupUser'])->name('signup-user');
Route::post('/login-user',[SignInCrontroler::class,'loginUser'])->name('login-user');

Route::get('/getStarted',[HomePageController::class,'index'])->middleware('isLoggedIn')->name('getStarted');
Route::post('/getstartuser',[HomePageController::class,'getStartedUser'])->middleware('isLoggedIn')->name('getstarted-user');

Route::get('/home',[HomeController::class,'index'])->middleware('isLoggedIn')->name('home');
Route::get('/userhome/{id}',[HomeController::class,'customindex'])->middleware('isLoggedIn')->name('customhome');
Route::get('/edit-profile/{id}',[EditProfileController::class,'edit'])->middleware('isLoggedIn')->name('editprofile');
Route::post('/editprofilecontrol/{profile_uid}',[EditProfileController::class,'editProfiles'])->middleware('isLoggedIn')->name('editprofileControl');


Route::get('/projects',[ProjectController::class,'index'])->middleware('isLoggedIn')->name('projects');
Route::get('/projects/{id}',[ProjectController::class,'customindex'])->middleware('isLoggedIn')->name('customprojects');
Route::get('/singleProject/{id}/{pid}',[ProjectController::class,'viewProject'])->middleware('isLoggedIn')->name('singleProject');
Route::get('/usersingleProject/{id}/{pid}',[ProjectController::class,'userviewProject'])->middleware('isLoggedIn')->name('usersingleProject');
Route::get('/addProject',[ProjectController::class,'addProject'])->middleware('isLoggedIn')->name('addProject');
Route::post('/addProject-form',[ProjectController::class,'addProjectDetails'])->middleware('isLoggedIn')->name('addProjectdetails');

Route::get('/editProject/{id}/{pid}',[ProjectController::class,'editProject'])->middleware('isLoggedIn')->name('editProject');
Route::post('/editProjectcontrol/{id}/{pid}',[ProjectController::class,'editProjectcontrol'])->middleware('isLoggedIn')->name('editProjectcontrol');


Route::get('/deleteProject/{id}/{pid}',[ProjectController::class,'deleteProject'])->middleware('isLoggedIn')->name('deleteProject');

Route::get('/logout',[HomePageController::class,'Logout'])->middleware('isLoggedIn')->name('Logout');



// admin routes


Route::get('/admin/index',[AdminLoginController::class,'mainindex'])->middleware('adminIsLogin')->name('adminindex');
Route::get('/admin',[AdminLoginController::class,'index'])->middleware('adminAlreadyLogin')->name('adminlogin');
Route::get('/admin/addUser',[AdminAddUserController::class,'index'])->middleware('adminIsLogin')->name('addAdminUser');

Route::post('/admin/addUserProcesses',[AdminAddUserController::class,'addAdminUser'])->middleware('adminIsLogin');

Route::post('/admin-process',[AdminLoginController::class,'adminloginUser']);

Route::get('/adminlogout',[AdminLoginController::class,'Logout'])->middleware('adminIsLogin')->name('adminLogout');


Route::get('/admin/users',[AdminController::class,'users'])->middleware('adminIsLogin');

Route::get('/admin/adminUsers',[AdminController::class,'adminUsers'])->middleware('adminIsLogin');

Route::get('/admin/delete/{id}',[AdminController::class,'deletefromadmin'])->middleware('adminIsLogin')->name('deletefromadmin');
Route::get('/admin/user/delete/{id}',[AdminController::class,'deleteinadmin'])->middleware('adminIsLogin')->name('deleteinadmin');


Route::post('/contact/{email}',[AdminController::class,'contactemail'])->middleware('adminIsLogin')->name('contactemail');