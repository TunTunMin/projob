@extends('frontend.master')
@section('content')

@include('frontend.search_header')
<div class="container">
	<div class="row mt-3">
    @include('frontend.profile.sidebar')
    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-9">
		<div class="card ">
			<div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <i class="fa fa-bars float-left mr-3 my-1" aria-hidden="true"></i>
                        <h5 class="float-left mr-3">Additional Info</h5>
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3">
                                <p class="text-muted">
                                    Expected Salary
                                </p>
                            </div>

                            <div class="col-9">
                                <p>
                                    {{$user_details->currency_unit}} {{$user_details->monthly_salary}}
                                </p>
                            </div>
                            <div class="col-3">
                                <p class="text-muted">
                                    Preferred work location
                                </p>
                            </div>
                            {{-- {{dd($user_details->townships)}} --}}
                            <div class="col-9">
                                {{$user_details->townships->name}}
                            </div>
                        </div>
                    </div>

                </div>

		    </div>
        </div>
    </div>
	</div>
</div>
@endsection
