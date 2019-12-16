@extends('frontend.master')
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light py-2 nav-tabs">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link navbar-nav pt-1" href="#">Search Jobs <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link navbar-nav pt-1" href="#">Company Profiles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navbar-nav pt-1" href="#">Training</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link pt-1 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            More
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
      <div class="form-inline my-2 my-lg-0">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 mx-3" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class=" navbar navbar-light list-group-item-secondary mt-2 py-0 nav-tabs">
  <div class="container">
    <a class="text-left"href="#">Jobs in <b>Singapore</b></a>
    <a class="text-right nav-link" href="#">{{$alljobs->currentPage()}} - {{ $alljobs->lastPage()}} of {{$alljobs->Total()}} Jobs</a>
  </div>
</div>

<div class="container">
  <div class="row mt-4">
    <div class="col-xs-12 col-sm-12 col-md-3">
      <div class="bg-light">
        <h4 class="pl-1 my-3 mb-3 w-100">Search Criteria</h4>
        <form action="searchjobs" method="GET">
          <!-- Search form -->
          <div class="form-inline active-pink-3 active-pink-4">
                <input class="form-control form-control-sm ml-1 my-1 w-100" type="text" placeholder="Job Title or keywords"
                aria-label="Job Title or keywords" name="title">
              </div>

          <div class="form-inline">
            <select class="custom-select form-control form-control-sm ml-1 my-1 w-100" id="inputGroupSelect02" name="job_specification">
              <option value="">All Specilizations</option>
            @forelse ($job_specifications as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @empty
                <option value="">There is no data</option>
             @endforelse
            </select>
          </div>

          <!-- Search form -->
          <div class="form-inline active-pink-3 active-pink-4">
            <input type="number" class="form-control form-control-sm ml-1 my-1 w-100" type="text" placeholder="Enter minimum Amount"
            aria-label="Enter minimum Amount" name="salary_min">
          </div>

          <!-- Search form -->
          <div class="form-inline active-cyan-3 active-cyan-4">
            <button type="submit" class="form-control form-control-sm btn btn-primary btn-sm ml-1 my-1 w-100">Search</button>
          </div>
        </form>
      </div>
      <div class="bg-light my-2 pl-2">
        <h4>Browse Jobs</h4>
        <ul  class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link navbar-nav pt-1" href="#">Specilizations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navbar-nav pt-1" href="#">Postion Levels</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navbar-nav pt-1" href="#">Company Names</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navbar-nav pt-1" href="#">Overseas Jobs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navbar-nav pt-1" href="#">Entry Level Jobs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navbar-nav pt-1" href="#">Classified Jobs</a>
          </li>
        </ul>
      </div>
      <div class="bg-light-my-2-pl-2">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Top Employers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Top Recruiters</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="row tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="col-sm-4 float-left">
              <a href="#">
                <img class="border border-secondary mt-2" src="https://www.jobstreet.com.sg/banner/2013/dso_te.gif" alt="Singapore Pte ltd">
              </a>
            </div>
            <div class="col-sm-4  float-left">
              <a href="#">
                <img class="border border-secondary mt-2" src="https://www.jobstreet.com.sg/banner/2013/dso_te.gif" alt="Singapore Pte ltd">
              </a>
            </div>
            <div class="col-sm-4  float-left">
              <a href="#">
                <img class="border border-secondary mt-2" src="https://www.jobstreet.com.sg/banner/2017/mediacorp_te.gif" alt="Singapore Pte ltd">
              </a>
            </div>
          </div>
          <div class="row tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="col-sm-4 float-left">
              <a href="#">
                <img class="border border-secondary mt-2" src="https://www.jobstreet.com.sg/banner/2013/dso_te.gif" alt="Singapore Pte ltd">
              </a>
            </div>
            <div class="col-sm-4  float-left">
              <a href="#">
                <img class="border border-secondary mt-2" src="https://www.jobstreet.com.sg/banner/2013/dso_te.gif" alt="Singapore Pte ltd">
              </a>
            </div>
            <div class="col-sm-4  float-left">
              <a href="#">
                <img class="border border-secondary mt-2" src="https://www.jobstreet.com.sg/banner/2017/mediacorp_te.gif" alt="Singapore Pte ltd">
              </a>
            </div>
            <div class="col-sm-4 float-left">
              <a href="#">
                <img class="border border-secondary mt-2" src="https://www.jobstreet.com.sg/banner/2013/dso_te.gif" alt="Singapore Pte ltd">
              </a>
            </div>
            <div class="col-sm-4  float-left">
              <a href="#">
                <img class="border border-secondary mt-2" src="https://www.jobstreet.com.sg/banner/2013/dso_te.gif" alt="Singapore Pte ltd">
              </a>
            </div>
            <div class="col-sm-4  float-left">
              <a href="#">
                <img class="border border-secondary mt-2" src="https://www.jobstreet.com.sg/banner/2017/mediacorp_te.gif" alt="Singapore Pte ltd">
              </a>
            </div>
            <div class="row tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item pl-1 active">
              <a class="nav-link" href="#">All Jobs <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item pl-3">
              <a class="nav-link" href="#">Direct Employers</a>
            </li>
            <li class="nav-item pl-3">
              <a class="nav-link" href="#">Recruitment Firms</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <select class="custom-select mr-sm-2 form-control form-control-sm ml-1 my-1 w-100" id="inputGroupSelect02">
              <option selected>Date</option>
              <option value="1">Job Title</option>
              <option value="2">Company</option>
              <option value="3">Location</option>
            </select>
          </div>
        </nav>

          {{-- {{dd($alljobs)}} --}}
          @foreach ($alljobs as $job)
          <div class="row border-bottom">
          <div class="col-9 py-2">
            <div class="pl-3">
                <a href="#">
                    <h5>{{ $job['title'] }}</h5>
                  </a>
                <a href="#">{{ $job['company']}}</a>
            </div>
            <div class="my-3 pl-3">
              <ul class="list-unstyled">
              <li class="list-unstyled"><i class="fas fa-map-marker-alt pr-1"></i>{{ $job['location']}}</li>
                <li><i class="fas fa-dollar-sign mr-1 w-14"></i>Login to view Salary</li>
              <li><i class="fas fa-calendar"></i>  {{date('d M Y h:i',strtotime($job['post_date']))}}</li>
              </ul>
            <p>{!! str_limit(strip_tags($job['job_highlights']),150,'...') !!}</p>
            </div>
          </div>
          <div class="col-3 py-2">
              @if ($job['logo'] <> null)
                <a href="#">
                <img class="float-right mr-3 my-3 img-fluid" src="{{URL::asset('projob_images/'.$job['logo'])}}" alt="projob">
                </a>
              @endif

          </div>
        </div>
          @endforeach



        </div>
      </div>

    </div>

  @endsection
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.css">
<link rel="stylesheet" href="{{URL::asset('css/highlight_github_theme.css')}}">
<style>
    #slider12a .slider-track-high, #slider12c .slider-track-high {
	background: green;
}

#slider12b .slider-track-low, #slider12c .slider-track-low {
	background: red;
}

#slider12c .slider-selection {
	background: yellow;
}
</style>
@endpush
@push('js')
<script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/bootstrap-slider.js"></script>
<script>

// With JQuery
$("#ex2").slider({});


</script>
@endpush
