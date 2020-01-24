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
use App\models\Qualification;
use App\Models\Role;
use App\Models\FieldStudy;
use App\Models\Township;
use App\Models\Skill;
use App\Models\Language;

class ProfileComposer
{
    public function compose(View $view)
    {
        $users =  Cache::remember('user-most-active', '60', function () {
            return User::find(Auth::user()->id);
        });

        $user_details = UserDetailInfo::with('townships', 'nationality')->where('user_id', Auth()->user()->id)->first();

        $user_experience = Experience::where('user_id', Auth()->user()->id)->first();

        $specializations  = Specialization::select('id', 'name')->pluck('name', 'id');

        $nationality = Nationality::select('id', 'name')->pluck('name', 'id');

        $industry = Industry::select('id', 'name')->pluck('name', 'id');

        $roles = Role::select('id', 'name')->pluck('name', 'id');

        $qualifications = Qualification::select('id', 'name')->pluck('name', 'id');

        $field_studies = FieldStudy::select('id', 'name')->pluck('name', 'id');

        $townships = Township::select('id', 'name')->pluck('name', 'id');

        // Skill
        $skills = Skill::where('user_id', Auth()->user()->id)->whereNull('deleted_at')->get();

        $group_skills = $skills->groupBy('position_level');
        // language
        $languages = Language::get();

        $view->with('users', $users)
            ->with('user_details', $user_details)
            ->with('user_experience', $user_experience)
            ->with('specializations', $specializations)
            ->with('nationality', $nationality)
            ->with('industry', $industry)
            ->with('qualifications', $qualifications)
            ->with('roles', $roles)
            ->with('field_studies', $field_studies)
            ->with('townships', $townships)
            ->with('group_skills', $group_skills)
            ->with('skills', $skills)
            ->with('languages', $languages);
    }
}
