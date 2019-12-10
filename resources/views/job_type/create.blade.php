@extends('adminlte::page')
@section('title', 'Type')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('job_type')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header bg-info">
                    <label for="staticEmail" class="col-form-label font-weight-bold" style="font-size: 25px;" > Create Job Type</label>
                    
                </div>
                <div class="card-body">
                    <h5 class="card-title float-left">JobType Id</h5>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" placeholder="JobType Id">
                    </div>
                </div>
                <div class="card-body">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Name">
                    </div>
                </div>

                    <div class="text-center mb-3">
                        <input type="submit" name="submit" class="btn btn-success p-r-20">
                    </div>
            </div>
            </form>
        </div>
    </div>

  @stop