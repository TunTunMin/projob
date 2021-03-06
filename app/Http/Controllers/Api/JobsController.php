<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobCollection;
use App\Models\Job;

class JobsController extends Controller
{
    /** JobCount and API  */
    public static function JobCount()
    {
        $jobcounts['jobcount'] = Job::count();
        if ($jobcounts['jobcount'] == 0) {
            $jobcounts['status'] = false;
        } else {
            $jobcounts['status'] = true;
        }
        return response()->json($jobcounts);
    }
    // all jobs
    public static function AllJobs($request)
    {
        $jobs = Job::select('*');
        if (isset($request->title)) {
            $jobs = $jobs->where('title', 'LIKE', '%' . $request->title . '%');
        }
        if (isset($request->specialization)) {
            $jobs = $jobs->where('specialization_id', $request->specialization);
        }
        // all jobs related with company
        if (isset($request->company_id)) {
            $jobs = $jobs->where('company_id', $request->company_id);
        }
        if (isset($request->salary_min)) {

            $jobs = $jobs->whereRaw('? between salary_from and salary_to', [$request->salary_min]);
        }
        if (isset($request->sort_title)) {
            switch ($request->sort_title) {
                case 1:
                    $jobs = $jobs->orderBy('title', 'ASC');
                    break;
                case 2:
                    $jobs = $jobs->with('getCompany')->leftJoin('companies', 'jobs.company_id', '=', 'companies.id')->orderBy('name', 'DESC')->whereNull('companies.deleted_at')->whereNull('jobs.deleted_at');
                    break;
                case 3:
                    $jobs =  $jobs->with('getCompany')->leftJoin('companies', 'jobs.company_id', '=', 'companies.id')->orderBy('location', 'DESC')->whereNull('companies.deleted_at')->whereNull('jobs.deleted_at');
                    break;
                default:
                    # code...
                    break;
            }
        }

        $jobs = $jobs->with('getCompany')->paginate(20);
        // dd($jobs);
        return response()->json($jobs);
    }
    // job details for api
    public static function job_details($id)
    {
        $job = Job::findorFail($id);
        $job_data['id'] = $job->id;
        $job_data['post_date'] = $job->post_date;
        $job_data['title'] = $job->title;
        $job_data['job_highlights'] = strip_tags($job->job_highlights);
        $job_data['job_description'] = strip_tags($job->job_description);
        $job_data['carrer_level'] = $job->carrer_level;
        $job_data['qualification'] = $job->qualification;
        $job_data['employee_type'] = $job->employee_type;
        $job_data['salary_unit'] = $job->salary_unit;
        $job_data['salary_from'] = $job->salary_from;
        $job_data['salary_to'] = $job->salary_to;
        $job_data['specialization'] = $job->getSpecialization->name;
        $job_data['job_type'] = $job->getJobType->name;
        $job_data['company'] = $job->getCompany->name;
        $job_data['location'] = $job->getCompany->location;
        $job_data['cover_photo'] = $job->getCompany->cover_photo;
        $job_data['logo'] = $job->getCompany->logo;
        $job_data['average_processtime'] = $job->getCompany->average_processtime;
        $job_data['ea_no'] = $job->getCompany->ea_no;
        $job_data['ea_register_no'] = $job->getCompany->ea_register_no;
        $job_data['industry'] = $job->getCompany->industry;
        $job_data['company_size'] = $job->getCompany->company_size;
        $job_data['company_overview'] = $job->getCompany->company_overview;
        $job_data['gallery'] = json_decode($job->getCompany->gallery);
        $job_data['website'] = $job->getCompany->website;
        $job_data['facebook'] = $job->getCompany->facebook;
        return response()->json($job_data);
    }
}
