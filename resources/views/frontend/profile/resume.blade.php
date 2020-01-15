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
				<i class="fa fa-paperclip float-left mr-3 my-1" aria-hidden="true"></i>
				<h6 class="float-left mr-3">Uploaded Resume</h6>
				<i class="fa fa-edit" aria-hidden="true"></i>
				<form class="form-group my-5">
					<label class=" form-item mr-3">File name</label>
					<label for="File" name="file">eimon.pdf</label>
					<i class="fa fa-trash ml-3" aria-hidden="true"></i><br>
					<label for="upload" class="mr-3">Uploaded</label>
					<label for="File" name="file">12 January 2019 10:00 am</label>
					<br>
					<button class="btn btn-info ">View</button>
					<button class="btn btn-info ">Replace</button>
				</form>
				<p>Note: The latest version of your uploaded resume is accessible to all employers that you have applied to. <a href="#"> Learn More</a></p>
			</div>	
			</div>
		</div>
	</div>
</div>
@endsection