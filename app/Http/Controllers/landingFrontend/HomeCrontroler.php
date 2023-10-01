<?php

namespace App\Http\Controllers\landingFrontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeCrontroler extends Controller
{
    public function index(){
        return view('landingFrontendPage.index');
    }
}
