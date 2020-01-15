<?php

namespace App\Http\Controllers;

use  App\Http\Controllers\Auth;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserDetailInfo;
use App\Models\Township;
use App\Models\Qualification;
use App\Models\FieldStudy;
use App\Models\Specialization;
use App\Models\Industry;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class RegistrationUserDetailController extends Controller
{
    //after registering, save first page
    public function firstpagesave(Request $request)
    {
        // dd($request->all());
        if (empty($request->all())) {
            abort(403, 'Sorry this page is not working, Please try again step by step!!!');
        } else {

            // dd($request->all());
            UserDetailInfo::updateOrCreate(['user_id' => $request['user_id']], $request->except(['_token']));
            // second page data
            $townships = Township::all();
            $qualifications = Qualification::all();
            $field_studies = FieldStudy::all();
            return view('auth.second_req')
                ->with('user_id', $request['user_id'])
                ->with('townships', $townships)
                ->with('qualifications', $qualifications)
                ->with('field_studies', $field_studies);
        }
    }
    //after registering, save second page
    public function secondpagesave(Request $request)
    {
        // dd($request->all());
        if (empty($request->all())) {
            abort(403, 'Sorry this page is not working, Please try again step by step!!!');
        } else {
            // $request['qualification_id'] = json_encode($request['qualification_id']);
            $graduation_month = $request['graduate_date_month'] < 10 ? '0' . $request['graduate_date_month'] : $request['graduate_date_month'];
            $request['graduate_date'] = json_encode($request['graduate_date_yr'] . '-' . $graduation_month);

            Education::updateOrCreate(['user_id' => $request['user_id']], $request->except(['_token', 'graduate_date_yr', 'graduate_date_month']));

            // for third user detail requirements
            $specializations = Specialization::all()->pluck('name', 'id');
            $industries = Industry::all()->pluck('name', 'id');
            $position_level = Config::get('helper.position_level');
            $roles = Role::all()->pluck('name', 'id');
            return view('auth.third_req')
                ->with('user_id', $request['user_id'])
                ->with('industries', $industries)
                ->with('specializations', $specializations)
                ->with('position_level', $position_level)
                ->with('roles', $roles);
        }
    }

    public function thirdpagesave(Request $request)
    {

        $modify_duration_from_month = $request['duration_from_month'] < 10 ? '0' . $request['duration_from_month'] : $request['duration_from_month'];
        $job_duration_from = $request['duration_from_yr'] . '-' . $modify_duration_from_month;
        $modify_duration_to_month = $request['duration_to_month'] < 10 ? '0' . $request['duration_to_month'] : $request['duration_to_month'];
        $job_duration_to = null;
        // dd(empty($request['duration_to_month']));
        if ($request['duration_to_yr'] <> null && $request['duration_to_month'] <> null) {
            $job_duration_to = $request['duration_to_yr'] . '-' . $modify_duration_to_month;
        }

        // dd($request->all());
        $data = ['position_title' => $request['position_title'], 'company_name' => $request['company_name'], 'job_duration_from' => $job_duration_from, 'job_duration_to' => $job_duration_to, 'role_id' => $request['role_id'], 'industries_id' => $request['industries_id'], 'position_level' => $request['position_level'], 'phone_no' => $request['phone_no'], 'currency_unit' => $request['currency_unit'], 'specializations_id' => $request['specializations_id']];
        // dd($data);
        if (empty($request->all())) {
            abort(403, 'Sorry this page is not working, Please try again step by step!!!');
        } else {

            Experience::updateOrCreate(['user_id' => $request['user_id']], $data);

            return redirect('/');
        }
    }
    // if u choose specialization, show related role
    public function changerole($id)
    {
        $role = Role::where('specialization_id', $id)->get();
        return response()->json($role);
    }
}
