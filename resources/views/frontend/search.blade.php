@extends('frontend.master')
@section('content')

@include('frontend.search_header')
<div class=" navbar navbar-light list-group-item-secondary mt-2 py-0 nav-tabs">
  <div class="container">
    <a class="text-left"href="#">Jobs in <b>Singapore</b></a>
    {{-- {{dd($data->data)}} --}}
    <a class="text-right nav-link" href="#">{{$data->current_page}} - {{ $data->last_page}} of {{$data->total}} Jobs</a>
  </div>
</div>

<div class="container">
  <div class="row mt-4">
    <div class="col-xs-12 col-sm-12 col-md-3">
      <div class="bg-light">
        <h4 class="pl-1 my-3 mb-3 w-100">Search Criteria</h4>
        <form id="search_form1" method="GET" action="/searchjobs">
          <!-- Search form -->
          <div class="form-inline active-pink-3 active-pink-4">
                <input class="form-control form-control-sm ml-1 my-1 w-100" type="text" placeholder="Job Title or keywords"
                aria-label="Job Title or keywords" name="title" id="title">
              </div>

          <div class="form-inline">
            <select class="custom-select form-control form-control-sm ml-1 my-1 w-100" id="job_specification" name="job_specification">
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
            aria-label="Enter minimum Amount" name="salary_min" id="salary_min">
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
          <form class="form-inline my-2 my-lg-0" id="sort_title">
            <select class="custom-select mr-sm-2 form-control form-control-sm ml-1 my-1 w-100" id="sort_title" name="sort_title">
              <option selected>Date</option>
              <option value="1">Job Title</option>
              <option value="2">Company</option>
              <option value="3">Location</option>
            </select>
          </form>
          </div>
        </nav>
      {{-- <div class="content-data"></div> --}}
        {{-- {{dd($data)}} --}}
        @if (count($data->data) > 0)
            @foreach ($data->data as $job)

            <div class="row border-bottom">
                <div class="col-9 py-2">
                <div class="pl-3">
                <a href="/jobdetails/{{$job->id}}">
                <h5>{{$job->title}}</h5>
                </a>
                <a href="#">{{$job->get_company->name}}</a>
                </div>
                <div class="my-3 pl-3">
                <ul class="list-unstyled">
                <li class="list-unstyled"><i class="fas fa-map-marker-alt pr-1"></i>{{$job->get_company->location }}</li>
                <li><i class="fas fa-dollar-sign mr-1 w-14"></i>Login to view Salary</li>

                <li>
                    <i class="fas fa-calendar"></i> {{$job->post_date}}
                    <span class="text-muted">({{\Carbon\Carbon::parse($job->post_date)->diffForHumans()}})</span>
                </li>
                </ul>
            <p>{!! str_limit($job->job_highlights,'100','...') !!}</p>
                </div></div><div class="col-3 py-2">
                @if ($job->get_company->logo != null)
                    <a href="#">
                    <img class="float-right mr-3 my-3 img-fluid" src="projob_images/{{$job->get_company->logo}}" alt="projob">
                    </a>
                @endif
                </div>
            </div>
            @endforeach

            @if (count($data->data)> 20)
            <div class="row mt-2">
                <div class="col-md-12">

                    @include('frontend.pagination',['paginator' => $data])
                </div>
            </div>
            @endif
        @endif
        </div>
      </div>

    </div>

  @endsection
@push('css')

<style>

</style>
@endpush
@push('js')
<script>
$('#sort_title').on('change',function(e){
e.preventDefault();
var sort_title = $('#sort_title').val();
console.log(sort_title);
$.ajax({
    method: 'get',
    url : '/searchjobs'
});
});
</script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
 <script>
   // GET request for remote image
   var title, salary_min, job_specification = null;
   var data = '';
   $('#search_form').submit(function(e){
    e.preventDefault();
    title = $('#title-search').val();
    axios({
            method: 'get',
            url: '/api/alljobs',
            responseType: 'json',
            params : {title: title},
            })
            .then(function (response) {

                showContent(response);

            })
            .catch(function (error) {
                console.log(error);
            });
   });
   $('#search_form1').submit(function(e){
    e.preventDefault();
    title = $('#title').val();
    salary_min = $('#salary_min').val();
    job_specification = $('#job_specification').val();

    axios({
            method: 'get',
            url: '/api/alljobs',
            responseType: 'json',
            params : {title: title, salary_min: salary_min, job_specification : job_specification},
            })
            .then(function (response) {

                showContent(response);

            })
            .catch(function (error) {
                console.log(error);
            });
        });
    // default show contenta data from api
    axios({
    method: 'get',
    url: '/api/alljobs',
    responseType: 'json',

    })
    .then(function (response) {

        showContent(response);

    })
    .catch(function (error) {
        console.log(error);
    });

    function showContent(response){
        console.log(response.data.data);
        data = '';
        jQuery.each(response.data.data, function(key, value){
        data += '<div class="row border-bottom">';
            data += '<div class="col-9 py-2">';
            data += '<div class="pl-3">';
            data += '<a href="/jobdetails/'+value.id+'">';
            data +='<h5>'+value.title+'</h5>';
            data +='</a>';
            data +='<a href="#">'+value.get_company.name+'</a>';
            data += '</div>';
            data += '<div class="my-3 pl-3">';
            data +='<ul class="list-unstyled">';
            data += '<li class="list-unstyled"><i class="fas fa-map-marker-alt pr-1"></i>'+value.job_location +'</li>';
            data += '<li><i class="fas fa-dollar-sign mr-1 w-14"></i>Login to view Salary</li>';

            data += '<li><i class="fas fa-calendar"></i> '+ value.post_date  + '</li>';
            data += '</ul>';
            data += '<p>' + value.job_highlights.substr(0,100,'...') + '</p>';
            data += '</div></div><div class="col-3 py-2">';
            if (value.get_company.logo != null)
                data += '<a href="#">';
                data += '<img class="float-right mr-3 my-3 img-fluid" src="projob_images/'+value.get_company.logo+'" alt="projob">';
                data += '</a>';

            data += '</div></div>';
        });
        $('.content-data').html(data);
    }

</script> --}}
@endpush
