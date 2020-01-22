<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Models\UserDetailInfo;
use App\Models\Experience;
use App\Models\Specialization;
use App\Models\Nationality;
use App\Models\Industry;
use App\Models\Role;

class ProfileComposer
{
    public function compose(View $view)
    {
        $users =  Cache::remember('user-most-active', '60', function () {
            return User::find(Auth::user()->id);
        });

        $user_details = UserDetailInfo::with('townships')->where('user_id', Auth()->user()->id)->first();

        $user_experience = Experience::where('user_id', Auth()->user()->id)->first();

        $specializations  = Specialization::select('id', 'name')->pluck('name', 'id');

        $nationality = Nationality::select('id', 'name')->pluck('name', 'id');

        $industry = Industry::select('id', 'name')->pluck('name', 'id');

        $roles = Role::select('id', 'name')->pluck('name', 'id');

        $view->with('users', $users)
            ->with('user_details', $user_details)
            ->with('user_experience', $user_experience)
            ->with('specializations', $specializations)
            ->with('nationality', $nationality)
            ->with('industry', $industry)
            ->with('roles', $roles);
    }
}
