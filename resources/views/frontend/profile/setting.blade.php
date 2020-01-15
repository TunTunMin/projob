@extends('frontend.profile.master')
@section('content')

@include('frontend.search_header')
<div class="container">
	<div class="row mt-3">
		@include('frontend.profile.sidebar')
		<!-- <div class="row ml-3"> -->
			<div class="card col-xs-12 col-sm-12 col-md-7 col-lg-8 ml-3">
				<div class="card-body">
					<div class="slide">
						<i class="fa fa-user-secret float-left mr-3 my-1" aria-hidden="true"></i>
						<h6 class="float-left mr-3">Privacy Setting</h6>
						<i class="fa fa-edit" aria-hidden="true"></i>
						<form class="form-group my-5">
							<input type="radio" name="optradio" checked>
							<label>Searchable with Contact Details</label>
							<p>Allow employers to search for my profile and see my name and contact details.</p>
							<input type="radio" name="optradio">
							<label>Not Searchable</label>
							<p>Do not allow employers to search for my profile.</p>
							<button class="btn btn-info ">Save</button>
						</form>
						
					</div>	
				</div>
			</div>
		</div>
	</div>
	@endsection