<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobCollection;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobSpecification;
use App\Models\JobType;
use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;
// use GuzzleHttp;
use App\Http\Controllers\Api\JobsController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->client = new Client();

        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $response = JobsController::JobCount();
        //    echo $response->getStatusCode(); # 200
        $jobcounts = $response->getData(); # '{"id": 1420053, "name": "guzzle", ...}'

        return view('index', ['jobcounts' => $jobcounts->jobcount]);
    }

    /** Search Jobs */
    public function searchjobs(Request $request)
    {


        $response = JobsController::AllJobs($request);
        $alljobs = $response->getData();

        // $alljobs = collect($alljobs)->except('status');
        // $alljobs = json_decode($alljobs, true);
        // $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // $perPage = 20;
        // $currentItems = array_slice($alljobs, $perPage * ($currentPage - 1), $perPage);

        // $paginator_Data = new LengthAwarePaginator($currentItems, count($alljobs), $perPage, $currentPage);
        // dd($paginator_Data);
        $job_specifications = JobSpecification::all();
        // dd($alljobs);
        return view('frontend.search', ['job_specifications' => $job_specifications, 'data' => $alljobs]);
    }

    public function jobDetails($id)
    {

        $data = JobsController::job_details($id)->getData();
        return view('frontend.job_details')->with('data', $data);
    }
    // API and use for All Jobs
    // public static function AllJobs(Request $request)
    // {
    //     // dd($request->all());
    //     $jobs = Job::select('*');
    //     if (isset($request->title)) {
    //         $jobs = $jobs->where('title', 'LIKE', '%' . $request->title . '%');
    //     }
    //     if (isset($request->job_specification)) {
    //         $jobs = $jobs->where('job_specification_id', $request->job_specification);
    //     }
    //     if (isset($request->salary_min)) {

    //         $jobs = $jobs->whereRaw('? between salary_from and salary_to', [$request->salary_min]);
    //     }
    //     $jobs = $jobs->with('getCompany')->paginate(20);

    //     // $alljobs = [];
    //     // if (count($jobs) > 0) {
    //     //     foreach ($jobs as $key => $job) {

    //     //         $alljobs[$key]['id'] = $job->id;
    //     //         $alljobs[$key]['post_date'] = $job->post_date;
    //     //         $alljobs[$key]['title'] = $job->title;
    //     //         $alljobs[$key]['job_highlights'] = strip_tags($job->job_highlights);
    //     //         $alljobs[$key]['job_description'] = strip_tags($job->job_description);
    //     //         $alljobs[$key]['carrer_level'] = $job->carrer_level;
    //     //         $alljobs[$key]['qualification'] = $job->qualification;
    //     //         $alljobs[$key]['employee_type'] = $job->employee_type;
    //     //         $alljobs[$key]['salary_unit'] = $job->salary_unit;
    //     //         $alljobs[$key]['salary_from'] = $job->salary_from;
    //     //         $alljobs[$key]['salary_to'] = $job->salary_to;
    //     //         $alljobs[$key]['job_specification'] = $job->getJobSpecification->name;
    //     //         $alljobs[$key]['job_type'] = $job->getJobType->name;
    //     //         $alljobs[$key]['company'] = $job->getCompany->name;
    //     //         $alljobs[$key]['location'] = $job->getCompany->location;
    //     //         $alljobs[$key]['logo'] = $job->getCompany->logo;
    //     //     }

    //     //     // $alljobs['status'] = true;
    //     // }

    //     // dd($alljobs);
    //     return response()->json($jobs);
    // }


}
