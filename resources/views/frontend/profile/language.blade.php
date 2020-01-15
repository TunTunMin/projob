@extends('frontend.profile.master')
@section('content')

@include('frontend.search_header')
<div class="container">
	<div class="row mt-3">
		@include('frontend.profile.sidebar')
		<!-- <div class="row ml-3"> -->

			<!-- Language -->
			<div class="card col-xs-12 col-sm-12 col-md-7 col-lg-8 ml-3">
				<div class="card-body">
					<div class="slide">
						<div class="row">
						<i class="fa fa-language float-left mr-3 my-1" aria-hidden="true"></i>
						<h5 class="float-left mr-3">Languages</h5>
						<i class="fa fa-edit" aria-hidden="true"></i>
						</div>
						<p class="text-left">Proficiency level: 0 - Poor, 10 - Excellent</p>
						<table class="table">
							<tr>
								<td>Language</td>
								<td>Spoken</td>
								<td>Written</td>
							</tr>
							<tr>
								<td class="mr-3">English</td>
								<td>7</td>
								<td>8</td>
							</tr>
							<tr>
								<td>Japanese</td>
								<td>2</td>
								<td>2</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
