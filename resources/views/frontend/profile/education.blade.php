@extends('frontend.profile.master')
@section('content')

@include('frontend.search_header')
<div class="container">
	<div class="row mt-3">
		@include('frontend.profile.sidebar')
		<!-- <div class="row ml-3"> -->

			<!-- Education -->
			<div class="card col-xs-12 col-sm-12 col-md-7 col-lg-8 float-right ml-3">
				<div class="card-body">
					<div class="slide">
						<i class="fa fa-graduation-cap float-left mr-3 my-1" aria-hidden="true"></i>
						<h5>Education</h5>
						<div class="col-lg-2 col-md-12 cpl-sm-12 float-left">
							<p>Feb 2018</p>
						</div>
						<div class="col-lg-10 col-md-12 col-sm-12 float-right">
							<h4 class="float-left">University of Computer Studies, Meiktila</h4>
							<p class="text-right">
								<i class="fa fa-edit" aria-hidden="true"></i>
								<i class="fa fa-trash" aria-hidden="true"></i>
							</p>
							<p class="d-block">Bachelor's Degree in Computer Science/Information Technology  |  Myanmar</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
