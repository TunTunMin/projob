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
        // dd($request->all());

        if (!empty($request->all())) {

            $request = $request;
            // $alljobs = Job::where('title', 'LIKE', '%' . $request['title'] . '%')->get()->toArray();
        } else {
            $request = null;
        }

        $response = $this->AllJobs($request);
        //    echo $response->getStatusCode(); # 200
        $alljobs = $response->getData(); //Body data from API

        $alljobs = collect($alljobs)->except('status');
        $alljobs = json_decode($alljobs, true);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 20;
        $currentItems = array_slice($alljobs, $perPage * ($currentPage - 1), $perPage);

        $paginator_Data = new LengthAwarePaginator($currentItems, count($alljobs), $perPage, $currentPage);

        $job_specifications = JobSpecification::all();

        return view('frontend.search', ['alljobs' => $paginator_Data, 'job_specifications' => $job_specifications]);
    }
    // API and use for All Jobs
    public static function AllJobs(Request $request)
    {

        $jobs = Job::select('*');
        if ($request->has('title')) {
            $jobs = $jobs->where('title', 'LIKE', '%' . $request->title . '%');
        }
        $jobs = $jobs->get();

        $alljobs = [];
        if (count($jobs) > 0) {
            foreach ($jobs as $key => $job) {
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
            $alljobs['status'] = true;
        } else {
            $alljobs['status'] = false;
        }
        return response()->json($alljobs);
    }
}
