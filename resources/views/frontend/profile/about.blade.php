@extends('frontend.master')
@section('content')

@include('frontend.search_header')
<div class="container">
	<div class="row mt-3">
        @include('frontend.profile.sidebar')
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <i class="fas fa-user float-left mr-3 my-1"></i>

                            <h5 class="float-left mr-3">Additional Info</h5>
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    <p class="text-muted">Name</p>
                                </div>
                                <div class="col-9">
                                    <p>{{$users->name}}</p>
                                </div>
                                <div class="col-3">
                                    <p class="text-muted">Gender</p>
                                </div>
                                <div class="col-9">
                                    <p>
                                        -
                                    </p>
                                </div>
                                <div class="col-3">
                                    <p class="text-muted">
                                        Contact No
                                    </p>
                                </div>
                                <div class="col-9">
                                        {{$user_experience->phone_no}}
                                </div>
                                <div class="col-3">
                                    <p class="text-muted">
                                        Email
                                    </p>
                                </div>
                                <div class="col-9">
                                    <p>
                                        {{$users->email}}
                                    </p>
                                </div>
                                <div class="col-3">
                                    <p class="text-muted">
                                        Address
                                    </p>
                                </div>
                                <div class="col-9">
                                    <p>
                                        {{$user_details->townships->name}}
                                    </p>
                                </div>
                                <div class="col-3">
                                    <p class="text-muted">Date of Birth</p>
                                </div>
                                <div class="col-9">
                                    <p>
                                        -
                                    </p>
                                </div>
                                <div class="col-3">
                                    <p class="text-muted">Nationality</p>
                                </div>
                                <div class="col-9">
                                    <p>
                                        {{$user_details->nationality->name}}
                                    </p>
                                </div>
                                <div class="col-3">
                                    <p class="text-muted">
                                        Permanent Resident
                                    </p>

                                </div>
                                <div class="col-9">
                                    {{$user_details->permanentresident->name}}
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
