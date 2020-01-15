@extends('frontend.profile.master')
@section('content')

@include('frontend.search_header')
<div class="container">

	<div class="row mt-3">
        @include('frontend.profile.sidebar')
        <!-- View Profile -->
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <p class="text-right">Last Updated: 03 Jan 2020</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <img class="float-left mr-3 p-0 img-fluid" src="{{asset('images/ttm.jpg')}}" alt="Profile">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                            <div class="row">
                                <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">

                                    <h5>{{$users->name}}</h5>
                                    <span class="d-block">{{$users->userdetails->position_title}}</span>
                                    <span class="d-block">{{$users->userdetails->company_name}}</span>
                                    <a href="#" class="text-dark float-left">
                                        <i class="fa fa-phone float-left mr-2 my-1" aria-hidden="true"></i>
                                        <span>{{$users->userdetails->phone_no}}&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                    </a>
                                    <a href="#" class="text-dark float-left">
                                        <i class="fa fa-envelope float-left mr-2 my-1" aria-hidden="true"></i>
                                        <span>{{$users->email}}&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                    </a>

                                    <span><strong>$</strong> {{$users->userdetails->currency_unit}} {{$users->userdetails->monthly_salary}}</span>

                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                                    <i class="fa fa-download mr-3" aria-hidden="true"></i>
                                    <i class="fas fa-print"></i>

                                </div>
                            </div>

                        </div>

                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <i class="fa fa-briefcase float-left mr-3 my-1" aria-hidden="true"></i>
                            <h5>Experience</h5>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <span>3 years of total experiences</span>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <span class="d-block">{{date('M Y',strtotime($users->userdetails->job_duration_from))}} - {{$users->userdetails->job_duration_to == null ? 'Present' : date('M Y',strtotime($users->userdetails->job_duration_to))}}</span>
                                    <?php

                                        $job_duration_to = $users->userdetails->job_duration_to == null ? date('Y-m') : $users->userdetails->job_duration_to;

                                        $to = \Carbon\Carbon::createFromFormat('Y-m', $users->userdetails->job_duration_from );
                                        $from = \Carbon\Carbon::createFromFormat('Y-m', $job_duration_to);
                                        $diff_in_months = $to->diff($from)->format('%y years, %m months');

                                    ?>

                                    <span class="text-muted">{{$diff_in_months}}</span>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                    <h5>{{$users->userdetails->company_name}}</h5>

                                    <div class="row mt-1">
                                        <div class="col-xs-5 col-sm-3">
                                            <p class="text-muted">Industry</p>
                                        </div>
                                        <div class="col-xs-7 col-sm-9">
                                            <p>Computer/Information Technology(Software)</p>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-xs-5 col-sm-3">
                                            <p class="text-muted">Specialization</p>
                                        </div>
                                        <div class="col-xs-7 col-sm-9">
                                            <p>IT/Computer - Software</p>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-xs-5 col-sm-3">
                                            <p class="text-muted">Role</p>
                                        </div>
                                        <div class="col-xs-7 col-sm-9">
                                            <p>Senior Full Stack Web Developer</p>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-xs-5 col-sm-3">
                                            <p class="text-muted">Position Level</p>
                                        </div>
                                        <div class="col-xs-7 col-sm-9">
                                            <p>Senior Level</p>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-xs-5 col-sm-3">
                                            <p class="text-muted">Monthly Salary </p>
                                        </div>
                                        <div class="col-xs-7 col-sm-9">
                                            <p>USD 2,000</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <i class="fa fa-graduation-cap float-left mr-3 my-1" aria-hidden="true"></i>
                            <h5>Education</h5>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-1">
                            <div class="row mt-1">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <p class="text-muted">Feb 2018</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                    <h5>University of Computer Studies, Meiktila</h5>
                                    <p>Bachelor's Degree in Computer Science/Information Technology  |  Myanmar</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-1">
                            <i class="fab fa-autoprefixer float-left mr-3 my-1"></i>
                            <h5>Skills</h5>
                        </div>
                        <div class="col-12">
                            <div class="row mt-1">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <p class="text-muted">Advanced</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                    <p>
                                        Communication Skills, TEAM LEADERSHIP, HTML Programming, Microsoft Office
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <p class="text-muted">Intermediate</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                    <p>
                                        English Language, CSS, JavaScript, PHP And MySQL, Presentation Skills
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <i class="fa fa-language float-left mr-3 my-1" aria-hidden="true"></i>
                            <h5>Languages</h5>
                        </div>
                        <div class="col-12">
                            <p>Proficiency level: 0 - Poor, 10 - Excellent</p>
                        </div>
                        <div class="col-12">
                            <div class="row mt-1">
                                <div class="col col-md-4 col-lg-4">
                                    <p class="text-muted">
                                        Language
                                    </p>
                                </div>
                                <div class="col col-md-4 col-lg-4">
                                    <p class="text-muted">
                                        Spoken
                                    </p>
                                </div>
                                <div class="col col-md-4 col-lg-4">
                                    <p class="text-muted">
                                        Written
                                    </p>
                                </div>
                                <div class="col col-sm-4">
                                    <p>
                                        English
                                    </p>
                                </div>
                                <div class="col col-sm-4">
                                    <p>
                                        6
                                    </p>
                                </div>
                                <div class="col col-sm-4">
                                    <p>
                                        8
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <i class="fa fa-bars float-left mr-3 my-1" aria-hidden="true"></i>
                            <h5>Additional Info</h5>
                        </div>
                        <div class="col-12">
                            <div class="row mt-1">
                                <div class="col-4">
                                    <p class="text-muted">
                                        Expected Salary
                                    </p>
                                </div>
                                <div class="col-8">
                                    <p>
                                        USD 2000
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-4">
                                    <p class="text-muted">
                                        Preferred Work Location
                                    </p>
                                </div>
                                <div class="col-8">
                                    <p>
                                        Anywhere in Singapore
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <i class="fa fa-user float-left mr-3 my-1" aria-hidden="true"></i>
                            <h5>About Me</h5>
                        </div>
                        <div class="col-12">
                            <div class="row mt-1">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <p class="text-muted">
                                        Address
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                    <p>
                                         Myanmar
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <p class="text-muted">
                                        Nationality
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                    <p>
                                         Myanmar
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <p class="text-muted">
                                        Permanent Resident
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                    <p>
                                         Myanmar
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
	</div>
</div>
</div>
@endsection
