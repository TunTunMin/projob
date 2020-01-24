@extends('frontend.master')
@section('content')

@include('frontend.search_header')
<div class="container">
	<div class="row mt-3">
		@include('frontend.profile.sidebar')

		<!-- Experience -->
        <div class="col-9">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <i class="fa fa-briefcase float-left mr-3 my-1" aria-hidden="true"></i>
                    <h5>Experience</h5>
                </div>
                <div class="col-12">
                    @flashMessage(['show' => session()->has('status') ])
                        {{session()->get('status')}}
                    @endflashMessage
                </div>
                <div class="col-12 mb-2" id="show-experience">
                    <div class="row">
                        <div class="col-3">
                            <p class="text-muted">
                                Experience Level
                            </p>
                        </div>
                        <div class="col-8">
                            <p>

                                @switch($user_details->working_since)
                                    @case(1)

                                            I am a fresh graduate seeking my first job

                                        @break
                                    @case(2)

                                            I am a student seeking internship or part-time jobs

                                        @break
                                    @default

                                            I have been working since {{$user_details->working_since}}

                                @endswitch
                            </p>
                        </div>
                        <div class="col-1">
                            <a id="experience-edit-show" href="#" class="text-dark">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12" id="experience_hide">
                    <div class="row">
                        <div class="col-3">
                            <p class="text-muted">
                                Experience Level <span class="required_color">*</span>
                            </p>
                        </div>
                        <div class="col-9">
                            <form action="{{route('experience-update')}}" method="post">
                                @csrf
                                <div class="form-check">
                                    <?php $working_since = null;$check = $check1 =$check2 = null; ?>
                                    @if ($user_details->working_since <> 1 && $user_details->working_since <> 2)
                                        <?php
                                            $working_since = $user_details->working_since;
                                            $check = 'checked';
                                        ?>

                                    @endif
                                    <input class="form-check-input" type="radio" name="working_since" id="working_since" value="option1" {{$check}}>
                                    <label class="form-check-label w-50" for="woking_snce">

                                        {!! Form::selectYear('since_year',1960,date('Y'), $working_since, ['class' => 'form-control since_year','id' => 'since_year']) !!}
                                    </label>
                                </div>
                                <div class="form-check">

                                    @if ($user_details->working_since == 1)
                                        <?php $check1 = "checked"; ?>
                                    @endif
                                    <input class="form-check-input" type="radio" name="working_since" id="first_graduate" value="1"  {{$check1}}>
                                    <label class="form-check-label" for="first_graduate">
                                        I am a fresh graduate seeking my first job
                                    </label>
                                </div>
                                <div class="form-check mb-5">
                                    @if ($user_details->working_since == 2)
                                        <?php $check2 = "checked"; ?>
                                    @endif
                                    <input class="form-check-input" type="radio" name="working_since" id="intern" value="2" {{$check2}}>
                                    <label class="form-check-label" for="intern">
                                        I am a student seeking internship or part-time jobs
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{url('/experience')}}" class="btn btn-danger">Cancel</a>
                            </form>

                        </div>

                    </div>
                </div>

                <div class="col-12 mb-2">
                    <hr>
                    <a href="#" class="btn btn-success float-right create-button-exp create-button-section" data-toggle="tooltip" data-placement="top" title="Add">
                        <i class="fas fa-plus-circle"></i>

                    </a>
                    <div class="clearfix my-2"></div>
                    <div class="row create-experience">
                        <div class="col-12">
                            {!! Form::open(['url' => route('experienceSave'),'method' =>'post']) !!}
                            @csrf
                            <div class="form-group row">
                                <label for="position_title" class="col-sm-3 col-form-label">Position Title <span class="required_color">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="position_title" id="position_title" class="form-control" placeholder="Enter Your Position" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company_name" class="col-sm-3 col-form-label">Company Name <span class="required_color">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter Company Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company_name" class="col-sm-3 col-form-label">Joined Duration <span class="required_color">*</span></label>
                                <div class="col-sm-3">
                                    {!! Form::selectYear('duration_from_year',1960,date('Y'),null,['class' => 'form-control','placeholder' => 'Year','required'=> 'true','id' => 'duration_from_year']) !!}
                                </div>
                                <div class="col-sm-3">
                                    {!! Form::selectMonth('duration_from_month',null,['class' => 'form-control','placeholder' => 'Month','required'=> 'true','id' => 'duration_from_month']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 offset-md-3">
                                    <label for="">To</label>
                                </div>
                            </div>
                            <div class="form-group row">


                                <div class="col-sm-3 offset-md-3">

                                    {!! Form::selectYear('duration_to_year',1960,date('Y'),null,['class' => 'form-control durationtoyr','placeholder' => 'Year','id' => 'duration_to_year']) !!}
                                </div>
                                <div class="col-sm-3">
                                    {!! Form::selectMonth('duration_to_month',null,['class' => 'form-control durationtomonth','placeholder' => 'Month','id' => 'duration_to_month']) !!}
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="present">
                                        <label class="form-check-label" for="present">
                                            Present
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    {!! Form::label('specialization', "Specialization", ['class' => 'require']) !!}
                                </div>
                                <div class="col-9">
                                    {!! Form::select('specializations_id', $specializations, null, ['class' => 'form-control','required' => true, 'placeholder' => 'Specialization','id' => 'specializations']) !!}
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    {!! Form::label('role', "Role", ['class' => 'require']) !!}
                                </div>
                                <div class="col-9">
                                    <select name="role_id" id="role" class="form-control" required>
                                        <option value="">Role</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    {!! Form::label('country', 'Country', null) !!}
                                </div>
                                <div class="col-9">
                                    {!! Form::select('country', $nationality, null, ['class' => 'form-control','required' => true,'id' => 'country']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('industry', 'Industry', ['class' => 'col-3 require']) !!}
                                <div class="col-9">
                                    {!! Form::select('industries_id', $industry, null, ['class'=> 'form-control','required' => true,'id' => 'industry']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('position_level', 'Position Level', ['class' => 'col-3 require']) !!}
                                <div class="col-9">
                                    {!! Form::select('position_level', Config::get('helper.position_level'), null, ['class' => 'form-control', 'required' => true,'id' => 'position_level']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('monthly_salary', 'Monthly Salary', ['class' => 'col-3']) !!}
                                <div class="col-3">
                                    {!! Form::select('currency_unit', Config::get('helper.units'), null, ['class' => 'form-control','required' => true,'id' => 'currency_unit']) !!}
                                </div>
                                <div class="col-6">
                                    {!! Form::number('monthly_salary', null , ['class' => 'form-control','min' => 0,'placeholder' => 'Enter Salary']) !!}
                                </div>
                            </div>
                            <input type="hidden" name="experience_id" id="experience_id">
                            <div class="col-sm-3 offset-md-3">
                            <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>

                            </div>
                            {!! Form::close() !!}

                            <hr>
                        </div>
                    </div>

                </div>
                <div class="col-12 mt-2">

                    @forelse ($users->experiences as $experience)
                        <div class="row" id="{{$experience->id}}">
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
                                <span class="d-block">{{date('M Y',strtotime($experience->job_duration_from))}} - {{$experience->job_duration_to == null ? 'Present' : date('M Y',strtotime($experience->job_duration_to))}}</span>
                                <?php

                                    $job_duration_to = $experience->job_duration_to == null ? date('Y-m') : $experience->job_duration_to;

                                    $to = \Carbon\Carbon::createFromFormat('Y-m', $experience->job_duration_from );
                                    $from = \Carbon\Carbon::createFromFormat('Y-m', $job_duration_to);
                                    $diff_in_months = $to->diff($from)->format('%y years, %m months');

                                ?>

                                <span class="text-muted">{{$diff_in_months}}</span>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
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
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="float-right">
                                <a  href="#" class="btn btn-warning create-button-exp" onclick="editFunction({{$experience->id}})">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <form action="experienceDelete/{{$experience->id}}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> <i class="far fa-trash-alt"></i></button>
                                </form>
                                </div>

                            </div>
                        </div>
                    @empty

                    @endforelse


                </div>
            </div>
        </div>
	</div>
</div>
@endsection
@push('css')
    <style>
        #experience_hide{
            display: none;
        }
        .require:after{
            content:'*';
            color:red;
        }
        .create-experience{
            display: none;
        }
    </style>
@endpush
@push('js')
<script>
    $('.since_year').select2({ width: '100%'});
    $('#duration_from_year').select2({ width: '100%'});
    $('#duration_from_month').select2({ width: '100%'});
    $('#duration_to_year').select2({ width: '100%'});
    $('#duration_to_month').select2({ width: '100%'});
    $('#specializations').select2({ width: '100%'});
    $('#industry').select2({ width: '100%'});
    $('#role').select2({ width: '100%'});
    $('#position_level').select2({ width: '100%'});
    $('#currencty_unit').select2({ width: '100%'});
    $('#since_year').on('change',function(){
        var value = $('#since_year').val();

        $('#working_since').val(value);
    });

    $('#experience-edit-show').on('click',function(){
        // alert('afafafaf');
        $('#show-experience').css('display','none');
        $('#experience_hide').css('display','block');
    });

    $('#specializations').on('change',function(){
        // console.log($(this).val());
        $.ajax({
            url: '/changerole/'+$(this).val(),
            type: 'GET',
            success: function(response){
                var roles = "";
                $.each(response,function(key, val){
                    roles += "<option value="+val.id+">"+val.name+"</option>";
                });
                $('#role').html(roles);
            }
        });
    });
    // Present
    $('#present').on('change', function(){
        if ($('#present').is(":checked"))
        {

            $('#duration_to_year').attr( {'required':false,'disabled':'disabled'});
            $('#duration_to_month').attr({'required':false, 'disabled': 'disabled'});

        }else{
            $('#duration_to_year').attr({'required':true,'disabled': false});
            $('#duration_to_month').attr({'required':true,'disabled': false});

        }
    });

    $('.create-button-exp').on('click',function(){
        $('.create-button-section').css('display','none');
        $('.create-experience').css('display','block');
    });

    function editFunction(id){
        $('#'+id).css('display','none');

        $.ajax({
            url : '/editExperience/'+id,
            dataType: 'json',
            method: 'GET',
            success: function(response){
               $('#experience_id').val(response.id);
               $('#position_title').val(response.position_title);
               $('#company_name').val(response.company_name);
            //    Duration From Year
            if(response.job_duration_from != null){
                var dt = response.job_duration_from.split('-');
                //    console.log(dt[0]);
                $( "#duration_from_year option:selected" ).val(dt[0]);
                $( "#select2-duration_from_year-container" ).text(dt[0]);
                // Duration From Month

                $( "#duration_from_month option:selected").val(parseInt(dt[1]));
                $( "#select2-duration_from_month-container" ).text(monthName(parseInt(dt[1])));
            }



            // Duration To
            if(response.job_duration_to != null){
                var duration_to = response.job_duration_to.split('-');
                //year
                $( "#duration_to_year option:selected" ).val(duration_to[0]);
                $( "#select2-duration_to_year-container" ).text(duration_to[0]);
                //month
                $( "#duration_to_month option:selected" ).val(parseInt(duration_to[1]));
                $( "#select2-duration_to_month-container" ).text(monthName(parseInt(duration_to[1])));
            }else{
                $('#present').attr('checked',true);
                $('#duration_to_year').attr({'required':false,'disabled': true});
                $('#duration_to_month').attr({'required':false,'disabled': true})
            }


            // Specializations
            var specializations = {!! json_encode($specializations->toArray()) !!};

            $( "#specializations option:selected" ).val(response.specializations_id);
            $( "#select2-specializations-container" ).text(specializations[response.specializations_id]);

            // Role
            var roles = {!! json_encode($roles->toArray()) !!};
            $( "#role option:selected" ).val(response.role_id);
            $( "#select2-role-container" ).text(roles[response.role_id]);
            //Industry
            var industry = {!! json_encode($industry->toArray()) !!};
            $( "#industry option:selected" ).val(response.industries_id);
            $( "#select2-industry-container" ).text(industry[response.industries_id]);
            //position level
            var position_level = {!! json_encode(Config::get('helper.position_level')) !!};
            $( "#position_level option:selected" ).val(response.position_level);
            $( "#select2-position_level-container" ).text(position_level[response.position_level]);
            //currency unit
            var currency_unit = {!! json_encode(Config::get('helper.units')) !!};
            $( "#currency_unit option:selected" ).val(response.currency_unit);
            $( "#select2-currency_unit-container" ).text(currency_unit[response.currency_unit]);
            //monthly salary
            $('#monthly_salary').val(response.monthly_salary);
            }



        });
    }
    function monthName(mon) {
        return ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'November', 'December'][mon - 1];
        }
</script>
@endpush
