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
					<i class="fa fa-arrows-alt float-left mr-3 my-1" aria-hidden="true"></i>
					<h5 class="float-left mr-3">Skills</h5>
					<i class="fa fa-edit" aria-hidden="true"></i>
					<table class="table">
						<tr style="font-size: 15px;">
							<td>Advanced</td>
							<td>&nbsp;&nbsp;Communication Skills, TEAM LEADERSHIP, HTML Programming, Microsoft Office</td>
						</tr>
						<tr style="font-size: 15px;">
							<td class="mr-3">Intermediate</td>
							<td>&nbsp;&nbsp;English Language, CSS, JavaScript, PHP And MySQL, Presentation Skills</td>
						</tr>
						<tr style="font-size: 15px;">
							<td>Basic</td>
							<td>&nbsp;&nbsp;Japanese Language</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection