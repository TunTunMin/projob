@extends('adminlte::page')
@section('title', 'Job Specification')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="/specializations/{{$specialization->id}}" method="post">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="text-center"> Edit Job Specification</h4>

                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name *:</label>

                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{$specialization->name}}" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" >Link</label>

                        <input type="text" class="form-control" id="inputName" placeholder="Enter Name" name="link" value="{{$specialization->name}}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-danger ">Cancel</a>
                        <div class="float-right">
                            <input type="submit" class="btn btn-success p-r-20" value="Update">
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

  @stop
