@extends('adminlte::page')
@section('title', 'Job Specification')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        	<div class="card">
        		<div class="card-header bg-info">
        			<h4>Job Specification Details</h4>
        		</div>
        		<div class="card-body">
                    <div class="form-group">
        			    <h3 class="float-left mr-4">Name:</h3>
        			    <input type="text" class="col-sm-4" name="{{$specialization->name}}" value="{{$specialization->name}}" disabled></label>
                    </div>
                    <div class="form-group">
                        <h3 class="float-left mr-4">Link:</h3>
                        <input type="text" class="col-sm-4" name="{{$specialization->link}}" value="{{$specialization->link}}" disabled></label>
                    </div>
        		</div>
        	</div>

        </div>
    </div>
</div>
@endsection
