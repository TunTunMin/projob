@extends('adminlte::page')
@section('title', 'Institute/ University')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-center">
                    <h4>Edit Institutes</h4>
                </div>
                <form method="post" action="/institutes/{{$data->id}}">
                @csrf
                @method('put')
                <div class="card-body">

                    <div role="form">
                        <div class="form-group">
                            <label>Name *:</label>
                            <input type="text" name="name" value="{{$data->name}}" class="form-control" autocomplete="off"/>
                         </div>

                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-danger ">Cancel</a>
                    <div class="float-right">
                        <button type="submit" class="btn-info btn">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
