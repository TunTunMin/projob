@extends('adminlte::page')
@section('title', 'Type')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="/job_type/{{$JobType->id}}" method="post">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="text-center"> Edit Job Type</h4>
                    
                </div>
               
                <div class="card-body">
                    <div class="form-group">
                    <label for="inputPassword">Name *:</label>
                   
                    <input type="text" class="form-control" id="inputName" placeholder="Enter Name" name="name" value="{{$JobType->name}}" autocomplete="off" required>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-danger ">Cancel</a>
                    <div class="float-right">
                        
                        <input type="submit" class="btn btn-success" value="Update">
                    </div>
                </div>

                    
            </div>
            </form>
        </div>
    </div>

  @stop