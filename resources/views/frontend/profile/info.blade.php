@extends('frontend.profile.master')
@section('content')

@include('frontend.search_header')
<div class="container">
	<div class="row mt-3">
	@include('frontend.profile.sidebar')
		<div class="card col-xs-12 col-sm-12 col-md-7 col-lg-8">
			<div class="card-body">
				<div class="slide">
				<i class="fa fa-bars float-left mr-3 my-1" aria-hidden="true"></i>
				<h5 class="float-left mr-3">Additional Info</h5>
				<i class="fa fa-edit" aria-hidden="true"></i>
				<table class="table">
					<tr>
						<td>Expected Salary</td>
						<td>USD 2000</td>
					</tr>
					<tr>
						<td>Preferred Work Location</td>
						<td>Anywhere in Singapore</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection