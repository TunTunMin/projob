<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Lang;
use App\Models\Language;
use App\Http\Requests\UploadResume;
use App\Models\UserDetailInfo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Experience;

class ProfileController extends Controller
{
    public function index()
    {

        return view('frontend.profile.index');
    }

    public function experience()
    {
        return view('frontend.profile.experience.index');
    }

    public function education()
    {
        return view('frontend.profile.education');
    }

    public function skill()
    {
        $skills = Skill::where('user_id', Auth()->user()->id)->whereNull('deleted_at')->get();

        $group_skills = $skills->groupBy('position_level');

        return view('frontend.profile.skill')->with('group_skills', $group_skills)->with('skills', $skills);
    }
    public function skillSave(Request $request)
    {

        if (!empty($request['skills'])) {
            foreach ($request['skills'] as $key => $skill) {
                Skill::updateOrCreate(['id' => $skill['skill_id']], ['name' => $skill['name'], 'position_level' => $skill['skill_level'], 'user_id' => Auth()->user()->id]);
            }
        }
        return redirect('skill');
    }

    public function language()
    {
        $languages = Language::get();
        return view('frontend.profile.language')->with('languages', $languages);
    }

    public function languageSave(Request $request)
    {
        // dd($request->all());
        if (!empty($request['languages'])) {
            foreach ($request['languages'] as $key => $value) {
                Language::updateOrCreate(['id' => $value['language_id']], ['language_id' => $value['language'], 'spoken' => $value['spoken'], 'written' => $value['written'], 'user_id' => Auth()->user()->id]);
            }
        }
        return redirect('/language');
    }
    public function info()
    {
        return view('frontend.profile.info');
    }

    public function about()
    {
        return view('frontend.profile.about');
    }
    // resume
    public function resume()
    {
        $resume_file = UserDetailInfo::select('id', 'resume')->where('user_id', Auth()->user()->id)->first();

        return view('frontend.profile.resume')->with('resume_file', $resume_file);
    }

    public function uploadresume(UploadResume $request)
    {
        $request->validated();
        $hashFile = $request->hasFile('resume');
        if ($hashFile) {
            $file = $request->file('resume');
            $originalname = $file->getClientOriginalName();
            $path = $file->storeAs('public/resumes/', $originalname);

            $user_detail_info = UserDetailInfo::where('user_id', Auth()->user()->id)->update(['resume' => $originalname]);
        }
        return redirect('/resume');
    }
    public function resumeDelete(Request $request)
    {
        $image_path = public_path('storage/resumes/' . $request->resume);
        // dd($image_path);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        UserDetailInfo::where('user_id', Auth()->user()->id)->update(['resume' => null]);
        $request->session()->flash('status', 'Your resume was successfully deleted!');
        return redirect('/resume');
    }

    public function setting()
    {
        return view('frontend.profile.setting');
    }
    // Repeater delete for skills
    public function delete_skill($id)
    {
        $skill = Skill::find($id);
        if ($skill->delete()) {
            return response()->json(['success' => true]);
        }
    }
    // Repeater delete for language
    public function delete_language($id)
    {
        $skill = Language::find($id);
        if ($skill->delete()) {
            return response()->json(['success' => true]);
        }
    }
    public function experienceSave(Request $request)
    {
        // dd($request->all());
        $modify_duration_from_month = $request['duration_from_month'] < 10 ? '0' . $request['duration_from_month'] : $request['duration_from_month'];
        $job_duration_from = $request['duration_from_year'] . '-' . $modify_duration_from_month;
        $modify_duration_to_month = $request['duration_to_month'] < 10 ? '0' . $request['duration_to_month'] : $request['duration_to_month'];
        $job_duration_to = null;
        if ($request['duration_to_year'] <> null && $request['duration_to_month'] <> null) {
            $job_duration_to = $request['duration_to_year'] . '-' . $modify_duration_to_month;
        }

        $data = ['position_title' => $request['position_title'], 'company_name' => $request['company_name'], 'job_duration_from' => $job_duration_from, 'job_duration_to' => $job_duration_to, 'role_id' => $request['role_id'], 'industries_id' => $request['industries_id'], 'position_level' => $request['position_level'], 'phone_no' => $request['phone_no'], 'currency_unit' => $request['currency_unit'], 'monthly_salary' => $request['monthly_salary'], 'specializations_id' => $request['specializations_id'], 'user_id' => Auth()->user()->id];

        Experience::updateOrCreate(['id' => $request['experience_id']], $data);
        return redirect('/experience');
    }
    public function editExperience($id)
    {
        $experience = Experience::findOrFail($id);
        return response()->json($experience);
    }
    public function experienceUpdate(Request $request)
    {
        UserDetailInfo::where('user_id', Auth()->user()->id)->update(['working_since' => $request['working_since']]);
        $request->session()->flash('status', 'Your experience level was successfully updated!');
        return redirect('/experience');
    }
}
