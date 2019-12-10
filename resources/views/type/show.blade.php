@extends('adminlte::page')
@section('title', 'Type')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        	<div class="card">	
        		<div class="card-header bg-info">	
        			<h4>Job Specification Details</h4>
        		</div>
        		<div class="card-body">	
        			<h3 class="float-left mr-4">Name:</h3>	
        			<input type="text" class="col-sm-4" name="{{$Type->name}}" value="{{$Type->name}}" disabled></label>
                    <div class="text-left mt-5">
                      <!-- Button trigger modal -->
                      <a href="{{ url('type') }}" class="btn btn-success" >Back to Job Type</a> 
                  </div>
                    
        		</div>	
        	</div>	

        </div>
    </div>
</div>
@endsection