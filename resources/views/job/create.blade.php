@extends('adminlte::page')
@section('title', 'Job')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="text-center">Add Job</h4>
                </div>
                {!! Form::open(['route' => 'job.store', 'method' => 'POST']) !!}
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="company">Company*:</label>
                                    <select name="company_id" id="company" class="form-control">
                                    @if (count($companies) > 0)
                                        @foreach ($companies as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="job_type">Job Type *:</label>
                                    <select name="job_type_id" id="job_type" class="form-control">
                                        @if (count($job_types) > 0)
                                        @foreach ($job_types as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="title">Title *:</label>
                                    <input type="text" name="title" id="title" class="form-control" required placeholder="Enter Title" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="post_date ">Post Date *:</label>
                                    <input type="text" name="post_date" id="post_date" class="form-control datetimepicker-input" autocomplete="off" required >
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="job_highlight">Job HighLight:</label>
                                    <textarea name="job_highlights" id="job_highlight"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="job_description">Job Description:</label>
                                    <textarea name="job_description" id="job_description"></textarea>
                                </div>

                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="job_specification">Job Specification*:</label>
                                    <select name="job_specification_id" id="job_specification" class="form-control" required>
                                        <option value="">Choose Job Specification</option>
                                        @if (count($job_specifications))
                                            @foreach ($job_specifications as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="career_level">Career Level*:</label>
                                    <input type="text" name="career_level" id="career_level" placeholder="Enter Career Level" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="qualification	">Qualification:</label>
                                    <input type="text" name="qualification" id="qualification" placeholder="Enter Qualification" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="employee_type">Employee Type*:</label>
                                    <input type="text" name="employee_type" id="employee_type" placeholder="Enter Employee Type" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="salary_from">Salary*:</label>
                                        <input type="text" name="salary_from" id="salary_from" placeholder="Enter Salary Minimum" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">&nbsp;</label>
                                        <input type="text" name="salary_to" id="salary_to" placeholder="Enter Salary Maximum" class="form-control" required>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Unit*:</label>
                                </div>
                                @foreach (Config::get('helper.units') as $item)
                                    @if ($item == "US")
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="salary_unit" id="{{$item}}" value="{{$item}}" checked>
                                        <label class="form-check-label" for="{{$item}}">
                                            {{$item}}
                                        </label>
                                    </div>
                                    @else
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="salary_unit" id="{{$item}}" value="{{$item}}">
                                            <label class="form-check-label" for="{{$item}}">
                                                {{$item}}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-danger ">Cancel</a>
                        <div class="float-right">
                            <button type="submit" class="btn-info btn">Save</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('css/summernote.css')}}">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    #logo_display, #cover_display,.gallery_display{
        display: none;
    }

</style>
@stop
@section('js')
<script src="{{asset('js/summernote.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
<script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
<script src="{{asset('fontawesome/js/fontawesome.js')}}"></script>

<script>

$(document).ready(function() {
  $('#job_description').summernote();
  $('#job_highlight').summernote();
});


$('#post_date').datetimepicker({
        });
</script>
@stop
