@extends('adminlte::page')
@section('title', 'Job')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-center">
                    <h4>Job Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label for="title" class="col-md-4 col-xs-12">Title:</label>
                        <div class="col-md-8 col-xs-12">{{$job->title}}</div>
                        <label for="post_date" class="col-md-4 col-xs-12">Post Date:</label>
                        <div class="col-md-8 col-xs-12">
                            {{date('d m Y h:i:s',strtotime($job->post_date))}}
                        </div>
                        <label for="company" class="col-md-4 col-xs-12">Company:</label>
                        <div class="col-md-8 col-xs-12">
                            @if ($job->getCompany <> null)
                                {{$job->getCompany->name}}
                            @endif
                        </div>
                        <label for="job_type" class="col-md-4 col-xs-12">Job Type:</label>
                        <div class="col-md-8 col-xs-12">
                            @if ($job->getJobType <> null)
                                {{$job->getJobType->name}}
                            @endif
                        </div>
                        <label for="job_specification" class="col-md-4 col-xs-12">Job Specification:</label>
                        <div class="col-md-8 col-xs-12">
                            @if ($job->getJobSpecification <> null)
                                {{$job->getJobSpecification->name}}
                            @endif
                        </div>
                        
                        <label for="job_highlight" class="col-md-4 col-xs-12">Job Highlight:</label>
                        <div class="col-md-8 col-xs-12">
                            {!! $job->job_highlights !!}
                        </div>

                        <label for="job_description" class="col-md-4 col-xs-12">Job Description:</label>
                        <div class="col-md-8 col-xs-12">
                            {!! $job->job_description !!}
                        </div>

                        <label for="career_level" class="col-md-4 col-xs-12">Career Level:</label>
                        <div class="col-md-8 col-xs-12">
                            {!! $job->career_level !!}
                        </div>

                        <label for="qualification" class="col-md-4 col-xs-12">Qualification:</label>
                        <div class="col-md-8 col-xs-12">
                            {!! $job->qualification !!}
                        </div>

                        <label for="eployee_type" class="col-md-4 col-xs-12">Employee Type:</label>
                        <div class="col-md-8 col-xs-12">
                            {!! $job->employee_type !!}
                        </div>
                        
                        <label for="salary" class="col-md-4 col-xs-12">Salary:</label>
                        <div class="col-md-8 col-xs-12">
                            {{ $job->salary_from }} - {{ $job->salary_to }}  {!! $job->salary_unit !!}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop