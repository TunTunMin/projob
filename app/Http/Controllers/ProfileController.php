<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('frontend.profile.index');
    }

    public function experience()
    {
        return view('frontend.profile.experience');
    }

    public function education()
    {
        return view('frontend.profile.education');
    }

    public function skill()
    {
        return view('frontend.profile.skill');
    }

    public function language()
    {
        return view('frontend.profile.language');
    }

    public function info()
    {
        return view('frontend.profile.info');
    }

    public function about()
    {
        return view('frontend.profile.about');
    }

    public function resume()
    {
        return view('frontend.profile.resume');
    }

    public function setting()
    {
        return view('frontend.profile.setting');
    }
}
