<?php

namespace App\Http\Controllers;

use App\package_categories;
use Illuminate\Http\Request;

class aboutUsController extends Controller
{
    public function index()
    {
        $aboutUsActive='aboutUsPage';
        $packageCategories=package_categories::all()->where('status','=',1);
        return view('about-us',['aboutUsActive'=>$aboutUsActive,'packageCategories'=>$packageCategories]);
    }
}
