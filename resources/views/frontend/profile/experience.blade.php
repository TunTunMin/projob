@extends('frontend.profile.master')
@section('content')

@include('frontend.search_header')
<div class="container">
	<div class="row mt-3">
		@include('frontend.profile.sidebar')

		<!-- Experience -->
		<div class="card col-xs-12 col-sm-12 col-md-7 col-lg-8 float-right">
			<div class="card-body">
				<div class="slide">
					<i class="fa fa-briefcase float-left mr-3 my-1" aria-hidden="true"></i>
					<h5>Experience</h5>
					<div class="col-lg-4 col-sm-12 ">
						<p>Feb 2018</p>					
					</div>

					<div class="col-lg-8 col-sm-12">
						<p class="float-left">I have been working since October 2017</p>
						<i class="fa fa-edit float-right mr-3 my-1 " aria-hidden="true"></i>
					</div>
				</div>
			</div>	
			<hr style="border-top: 1px solid #8c8b8b" class="mt-10">
			<div class="slide">
				<div class="row text-right">
					<i class="fa fa-plus-circle mr-3" aria-hidden="true"></i>
					<h6>Add</h6>
				</div>
				<div class="col-lg-4 col-sm-12 float-left">
					<span class="d-block">May 2017 - Feb 2019</span>
					<span>1 year 10 months</span>
				</div>
				<div class="col-lg-8 col-sm-12 float-right">
					<h4 class="float-left">Web Developer</h4>
					<p class="text-right">
						<i class="fa fa-edit" aria-hidden="true"></i>
						<i class="fa fa-trash" aria-hidden="true"></i>
					</p>
					<span>InyaLand Co.,Ltd.</span>
					<i class="fa fa-comment" aria-hidden="true"></i>
					<a href="">Review Company</a>
					<table class="mt-3">
						<tr style="font-size: 15px;">
							<td>Industry</td>
							<td>&nbsp;&nbsp;Computer/Information Technology(Software)</td>
						</tr>
						<tr style="font-size: 15px;">
							<td class="mr-3">Specialization</td>
							<td>&nbsp;&nbsp;IT/Computer - Software</td>
						</tr>
						<tr style="font-size: 15px;">
							<td>Role</td>
							<td>&nbsp;&nbsp;Senior Full Stack Web Developer</td>
						</tr>
						<tr>
							<td>Position Level</td>
							<td>&nbsp;&nbsp;Senior Executive</td>
						</tr>
						<tr style="font-size: 15px;">
							<td>Monthly Salary</td>
							<td>&nbsp;&nbsp;USD 2,000</td>
						</tr>
					</table>
				</div>
			</div>				
		</div>
	</div>
</div>
@endsection