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
                            <div id="profile-show">
                                <a>
                                    <img class="float-left img-fluid profile-image" src="{{asset('storage/profiles/'.$user_details->profile)}}" alt="Profile" >
                                </a>
                                <div class="profile-modify-group btn-group-vertical">
                                    <button class="profile-btn" type="button" data-toggle="modal" data-target="#exampleModal">Upload</button>
                                    <form action="{{route('profileDelete')}}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="resume" value="{{$user_details->profile}}">
                                        <button class="profile-btn" type="submit">Remove</button>
                                    </form>
                                </div>
                            </div>


                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                            <div class="row">
                                <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">

                                    <h5>{{$users->name}}</h5>
                                    {{-- {{dd($users->experiences[0]->position_title)}} --}}
                                    <span class="d-block">{{$users->experiences[0]->position_title}}</span>
                                    <span class="d-block">{{$users->experiences[0]->company_name}}</span>
                                    <a href="#" class="text-dark float-left">
                                        <i class="fa fa-phone float-left mr-2 my-1" aria-hidden="true"></i>
                                        {{-- <span>{{$users->experiences[0]->phone_no}}&nbsp;&nbsp;|&nbsp;&nbsp;</span> --}}
                                    </a>
                                    <a href="#" class="text-dark float-left">
                                        <i class="fa fa-envelope float-left mr-2 my-1" aria-hidden="true"></i>
                                        <span>{{$users->email}}&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                    </a>

                                    <span><strong>$</strong> {{$users->experiences[0]->currency_unit}} {{$users->experiences[0]->monthly_salary}}</span>

                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                                    <i class="fa fa-download mr-3" aria-hidden="true"></i>
                                    <i class="fas fa-print"></i>

                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                        {!! Form::open(['url' => 'profileSave', 'method' => 'post','enctype' => 'multipart/form-data']) !!}
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Upload Profile</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::file('profile', ['required' => true]) !!}
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-12">
                            @flashMessage(['show' => session()->has('status') ])
                                {{session()->get('status')}}
                            @endflashMessage
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

                                @forelse ($users->experiences as $experience)

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                        <span class="d-block">
                                            {{date('M Y',strtotime($experience->job_duration_from))}} - {{$experience->job_duration_to == null ? date('M Y') : date('M Y',strtotime($experience->job_duration_to))}}
                                        </span>

                                        <?php

                                            if($experience->job_duration_to == null){
                                                $duration_to = date('Y-m');
                                            }else{
                                                $duration_to = $experience->job_duration_to;
                                            }
                                            $job_duration_to = $duration_to;

                                            $to = \Carbon\Carbon::createFromFormat('Y-m', $experience->job_duration_from );

                                            $from = \Carbon\Carbon::createFromFormat('Y-m', $job_duration_to);
                                            $diff_in_months = $to->diff($from)->format('%y years, %m months');

                                        ?>

                                        <span class="text-muted">{{$diff_in_months}}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                        <h5>{{$experience->company_name}}</h5>

                                        <div class="row mt-1">
                                            <div class="col-xs-5 col-sm-3">
                                                <p class="text-muted">Industry</p>
                                            </div>
                                            <div class="col-xs-7 col-sm-9">

                                            <p>{{$experience->industry->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-xs-5 col-sm-3">
                                                <p class="text-muted">Specialization</p>
                                            </div>
                                            <div class="col-xs-7 col-sm-9">
                                                <p>{{$experience->specialization->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-xs-5 col-sm-3">
                                                <p class="text-muted">Role</p>
                                            </div>
                                            <div class="col-xs-7 col-sm-9">
                                                <p>{{$experience->role->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-xs-5 col-sm-3">
                                                <p class="text-muted">Position Level</p>
                                            </div>
                                            <div class="col-xs-7 col-sm-9">
                                            <p>{{Config::get('helper.position_level')[$experience->position_level]}}</p>
                                            </div>
                                        </div>
                                        @if ($experience->currency_unit <> null && $experience->monthly_salary <> null )
                                            <div class="row mt-1">
                                                <div class="col-xs-5 col-sm-3">
                                                    <p class="text-muted">Monthly Salary </p>
                                                </div>
                                                <div class="col-xs-7 col-sm-9">
                                                <p>{{Config::get('helper.units')[$experience->currency_unit]}} {{$experience->monthly_salary}}</p>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                @empty

                                @endforelse

                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <i class="fa fa-graduation-cap float-left mr-3 my-1" aria-hidden="true"></i>
                            <h5>Education</h5>
                        </div>
                        @forelse ($users->education as $education)
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-1">
                                <div class="row mt-1">
                                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                    <p class="text-muted">

                                        {{date('M Y',strtotime(json_decode($education->graduate_date)))}}
                                    </p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                        <h5>{{$education->institute_university}}</h5>
                                        <p>{{$education->qualification->name}}/ {{$education->field_study->name}} |  Myanmar</p>
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse

                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-1">
                            <i class="fab fa-autoprefixer float-left mr-3 my-1"></i>
                            <h5>Skills</h5>
                        </div>
                        <div class="col-12" id="hide-skills">
                            @forelse ($group_skills as $key => $item)
                                <div class="row">
                                <div class="col-3">
                                    <p class="text-muted">
                                            {{Config::get('helper.skill_level')[$key]}}
                                    </p>
                                </div>
                                <div class="col-9">
                                    <p>
                                    <?php $count = count($item); ?>
                                    @forelse ($item as $detail_item)

                                            {{$detail_item->name}}
                                        @if ($count > 1)
                                        ,
                                        @endif
                                    <?php $count--; ?>
                                    @empty
                                    </p>
                                    @endforelse
                                </div>
                                </div>
                            @empty
                                <div class="row">

                                    <div class="col-12">
                                        <p>There are nothing skills</p>
                                    </div>
                                </div>
                            @endforelse

                        </div>

                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <i class="fa fa-language float-left mr-3 my-1" aria-hidden="true"></i>
                            <h5>Languages</h5>
                        </div>
                        <div class="col-12" id="hide-skills">
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-muted">
                                        Languages
                                    </p>
                                </div>
                                <div class="col-3">
                                    <p class="text-muted">
                                        Spoken
                                    </p>
                                </div>
                                <div class="col-3">
                                    <p class="text-muted">
                                        written
                                    </p>
                                </div>
                            </div>

                            @forelse ($languages as $key => $item)
                                <div class="row">
                                    <div class="col-6">
                                        <p>
                                            {{Config::get('helper.languages')[$item->language_id]}}
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <p>
                                            {{$item->spoken}}
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <p>
                                            {{$item->written}}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="row">

                                    <div class="col-12">
                                        <p>There are nothing languages</p>
                                    </div>
                                </div>
                            @endforelse

                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <i class="fa fa-bars float-left mr-3 my-1" aria-hidden="true"></i>
                            <h5>Additional Info</h5>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    <p class="text-muted">
                                        Expected Salary
                                    </p>
                                </div>

                                <div class="col-9">
                                    <p>
                                        {{$user_details->currency_unit}} {{$user_details->monthly_salary}}
                                    </p>
                                </div>
                                <div class="col-3">
                                    <p class="text-muted">
                                        Preferred work location
                                    </p>
                                </div>
                                {{-- {{dd($user_details->townships)}} --}}
                                <div class="col-9">
                                    {{$user_details->townships->name}}
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
                                        -
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
                                        {{$user_details->nationality->name}}
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
                                        {{$user_details->permentresident->name}}
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
@push('css')
 <style>
     #profile-show,.profile-image{
         width: 100%;
         position: relative;
     }
     .profile-modify-group{
         display: none;
         position: absolute;
         z-index: 99999;
         bottom: 0
     }
     #profile-show{
         width: 100px;
         height: 100px;
     }
     .profile-btn{
         width: 100%;
     }

 </style>
@endpush
@push('js')
<script>
    $('#profile-show').hover(function(){
        if($('#profile-show').is(':hover')){
            $('.profile-modify-group').css('display','block');
        }else{
            $('.profile-modify-group').css('display','none');
        }

    });
</script>
@endpush
