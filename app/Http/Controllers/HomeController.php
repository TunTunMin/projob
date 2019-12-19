<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobSpecification;
use App\Models\JobType;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $response = $this->JobCount();
        //    echo $response->getStatusCode(); # 200
        $jobcounts = $response->getData(); # '{"id": 1420053, "name": "guzzle", ...}'

        return view('index', ['jobcounts' => $jobcounts->jobcount]);
    }
    /** JobCount and API  */
    public function JobCount()
    {
        $jobcounts['jobcount'] = Job::count();
        if ($jobcounts['jobcount'] == 0) {
            $jobcounts['status'] = false;
        } else {
            $jobcounts['status'] = true;
        }
        return response()->json($jobcounts);
    }
    /** Search Jobs */
    public function searchjobs(Request $request)
    {


        // if (!empty($request->all())) {

        //     $request = $request;
        //     $alljobs = Job::where('title', 'LIKE', '%' . $request['title'] . '%')->get()->toArray();
        // } else {
        //     $request = null;
        // }

        // $response = $this->AllJobs($request);
        // $alljobs = $response->getData();

        // $alljobs = collect($alljobs)->except('status');
        // $alljobs = json_decode($alljobs, true);
        // $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // $perPage = 20;
        // $currentItems = array_slice($alljobs, $perPage * ($currentPage - 1), $perPage);

        // $paginator_Data = new LengthAwarePaginator($currentItems, count($alljobs), $perPage, $currentPage);

        $job_specifications = JobSpecification::all();

        return view('frontend.search', ['job_specifications' => $job_specifications]);
    }
    // API and use for All Jobs
    public static function AllJobs(Request $request)
    {
        // dd($request->all());
        $jobs = Job::select('*');
        if (isset($request->title)) {
            $jobs = $jobs->where('title', 'LIKE', '%' . $request->title . '%');
        }
        if (isset($request->job_specification)) {
            $jobs = $jobs->where('job_specification_id', $request->job_specification);
        }
        if (isset($request->salary_min)) {

            $jobs = $jobs->whereRaw('? between salary_from and salary_to', [$request->salary_min]);
        }
        $jobs = $jobs->get();

        $alljobs = [];
        if (count($jobs) > 0) {
            foreach ($jobs as $key => $job) {
                $alljobs[$key]['id'] = $job->id;
                $alljobs[$key]['post_date'] = $job->post_date;
                $alljobs[$key]['title'] = $job->title;
                $alljobs[$key]['job_highlights'] = strip_tags($job->job_highlights);
                $alljobs[$key]['job_description'] = strip_tags($job->job_description);
                $alljobs[$key]['carrer_level'] = $job->carrer_level;
                $alljobs[$key]['qualification'] = $job->qualification;
                $alljobs[$key]['employee_type'] = $job->employee_type;
                $alljobs[$key]['salary_unit'] = $job->salary_unit;
                $alljobs[$key]['salary_from'] = $job->salary_from;
                $alljobs[$key]['salary_to'] = $job->salary_to;
                $alljobs[$key]['job_specification'] = $job->getJobSpecification->name;
                $alljobs[$key]['job_type'] = $job->getJobType->name;
                $alljobs[$key]['company'] = $job->getCompany->name;
                $alljobs[$key]['location'] = $job->getCompany->location;
                $alljobs[$key]['logo'] = $job->getCompany->logo;
            }
            // $alljobs['status'] = true;
        }

        // dd($alljobs);
        return response()->json($alljobs);
    }

    // job details
    public function job_details($id)
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
        $job_data['job_specification'] = $job->getJobSpecification->name;
        $job_data['job_type'] = $job->getJobType->name;
        $job_data['company'] = $job->getCompany->name;
        $job_data['location'] = $job->getCompany->location;
        $job_data['logo'] = $job->getCompany->logo;
        return response()->json($job_data);
    }
}
