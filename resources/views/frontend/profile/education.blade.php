@extends('frontend.master')
@section('content')

@include('frontend.search_header')
<div class="container">
	<div class="row mt-3">
		@include('frontend.profile.sidebar')
		<!-- <div class="row ml-3"> -->

			<!-- Education -->
			<div class="card col-xs-12 col-sm-12 col-md-7 col-lg-8 float-right ml-3">
				<div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <i class="fa fa-graduation-cap float-left mr-3 my-1" aria-hidden="true"></i>
                            <h5>Education</h5>
                            <p class="text-muted">Please add your two highest educations</p>
                        </div>
                        <div class="col-2">
                            <a href="#" class="text-decoration-none float-right text-dark add_education" data-toggle="tooltip" data-placement="top" title="Add" id="add_education">
                                <i class="fas fa-plus-circle"></i>
                                Add
                            </a>
                        </div>
                        <div class="col-12">
                            @flashMessage(['show' => session()->has('status') ])
                                {{session()->get('status')}}
                            @endflashMessage
                        </div>
                        <div class="col-12" id="education_modify">
                            <hr>
                            {!! Form::open(['url' => 'educationSave','method' => 'POST']) !!}
                            @csrf
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        {!! Form::label('institute', 'Institute/University', ['class' => 'require']) !!}
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        {!! Form::text('institute_university', null, ['class' => 'form-control','placeholder' => 'Enter Institute University','id' => 'institute_university']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        {!! Form::label('graduation_date', 'Graduation Date', ['class' => 'require']) !!}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        {!! Form::selectYear('graduate_date_year',1960,date('Y'),null,['class' => 'form-control','placeholder' => 'Year','required'=> 'true','id' => 'graduate_date_year']) !!}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        {!! Form::selectMonth('graduate_date_month',null,['class' => 'form-control','placeholder' => 'Month','required'=> 'true','id' => 'graduate_date_month']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        {!! Form::label('qalification', 'Qualification', ['class' => 'require']) !!}
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        {!! Form::select('qualification_id', $qualifications , null, ['class'=> 'form-control','id' => 'qualification']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        {!! Form::label('institute_location_id', 'Institute/University Location', ['class' => 'require']) !!}
                                    </div>
                                </div>
                                <div class="col-9">
                                        {!! Form::select('institute_location_id', $townships , null, ['class'=> 'form-control','id' => 'institute_location_id']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="from-group">
                                        {!! Form::label('field_study', 'Field of Study', ['class' => 'require']) !!}
                                    </div>
                                </div>

                                <div class="col-9">
                                    <div class="form-group">
                                        {!! Form::select('field_study_id', $field_studies, null, ['class' => 'form-control','id' => 'field_study_id']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        {!! Form::label('major', 'Major', null) !!}
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        {!! Form::text('major', null, ['class' => 'form-control','placeholder' => 'Enter Major','id' => 'major']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        {!! Form::label('grade', 'Grade', null) !!}
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group">

                                        {!! Form::select('grade', Config::get('helper.grades'),null, ['class' => 'form-control','placeholder' => 'Choose Grade','id' => 'grade']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        {!! Form::label('additional_info', 'Additional Information', null) !!}
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        {!! Form::textarea('additional_info', null, ['class' => 'form-control','id' => 'additional_info']) !!}
                                    </div>
                                </div>
                            </div>
                        <input type="hidden" name="id" id="education_id">
                            <div class="col-sm-3 offset-md-3">
                                <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            {!! Form::close() !!}
                            <hr>
                        </div>
                        @forelse ($users->education as $education)
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-1">
                                <div class="row mt-1" id="{{$education->id}}">
                                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                    <p class="text-muted">

                                        {{date('M Y',strtotime(json_decode($education->graduate_date)))}}
                                    </p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                        <h5>{{$education->institute_university}}</h5>
                                        <p>{{$education->qualification->name}}/ {{$education->field_study->name}} |  Myanmar</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                                        <div class="float-right">
                                        <a  href="#" class="btn btn-warning add_education" onclick="editFunction({{$education->id}})">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <form action="educationDelete/{{$education->id}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"> <i class="far fa-trash-alt"></i></button>
                                        </form>
                                        </div>
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
        #add_education:hover{
            text-decoration: none;
        }
        .require:after{
            content:'*';
            color:red;
        }
        #education_modify{
            display: none;
        }
    </style>
@endpush
@push('js')
<script>
    $('#graduate_date_year').select2({ width: '100%', placeholder: "Year"});
    $('#graduate_date_month').select2({ width: '100%', placeholder: "Month"});
    $('#qualification').select2({ width: '100%'});
    $('#institute_location_id').select2({ width: '100%'});
    $('#field_study_id').select2({ width: '100%'});
    $('#grade').select2({ width: '100%'});
    $('.add_education').on('click',function(){
        $('#education_modify').css('display','block');
    });
    function editFunction(id){
        $('#'+id).css('display','none');
        $.ajax({
            url : '/editEducation/'+id,
            dataType: 'json',
            method: 'GET',
            success: function(response){
                $('#education_id').val(id);
                $('#institute_university').val(response.institute_university);
                var graduate_date = eval(response.graduate_date);
                // console.log(graduate_date);
                var dt = graduate_date.split('-');

                $( "#graduate_date_year option:selected" ).val(dt[0]);
                $( "#select2-graduate_date_year-container" ).text(dt[0]);
                // Duration From Month

                $( "#graduate_date_month option:selected").val(parseInt(dt[1]));
                $( "#select2-graduate_date_month-container" ).text(monthName(parseInt(dt[1])));
                // Qualification
                var qalifications = {!! json_encode($qualifications->toArray()) !!}
                $( "#qualification option:selected").val(response.qualification_id);
                $( "#select2-qualification-container" ).text(qalifications[response.qualification_id]);
                // Institute/University Location
                var townships = {!! json_encode($townships->toArray()) !!}
                $( "#qualification option:selected").val(response.institute_location_id);
                $( "#select2-qualification-container" ).text(townships[response.institute_location_id]);
                // Field Study
                var field_studies = {!! json_encode($field_studies->toArray()) !!}
                $( "#field_study_id option:selected").val(response.field_study_id);
                $( "#select2-field_study_id-container" ).text(field_studies[response.field_study_id]);
                // Major
                $('#major').val(response.major);
                // Grade
                if(response.grade != null){
                    var grades = {!! json_encode(Config::get('helper.grades')) !!}
                $( "#grade option:selected").val(response.grade);
                $( "#select2-grade-container" ).text(grades[response.grade]);
                }

                // additional info
                $('#additional_info').val(response.additional_info);
            }
        });
    }

    function monthName(mon) {
        return ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'November', 'December'][mon - 1];
        }
</script>
@endpush
