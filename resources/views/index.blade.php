@extends('frontend.master')
@section('content')
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid bg-info text-white" id="home">
    <div class="container text-sm-center pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="background:rgba(255, 255, 255, .3);">
                    <div class="card-body">
                        <h5 class="card-title text-primary">58, 567 jobs in Singapore</h5>
                        <p class="card-text text-primary">Most Quality Jobs •  Most Quality Employers •  Most Trusted</p>
                        <a href="#" class="card-link btn btn-warning">Free Sign Up</a>
                        <a href="#"  class="card-link btn btn-info">Search Jobs</a>
                    </div>
                </div>
            </div>	
        </div>
        
    </div>
</div>
<!-- /Jumbotron -->
<!-- Speaker -->
<div class="container">
<div class="row">
    <div class="col-md-6 col-lg-4 col-sm-12">
        <div class="mb-3 text-center">
            <h4>Professional Identity</h4>
            <img src="images/js_1.jpg" class="rounded-circle" alt="Vivianne">
            <div class="card-body">
                <p class="card-text">Build your professional identity online and stay connected with opportunities.</p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 col-sm-12">
        <div class="mb-3 text-center">
            <h4 class="card-title">Your Personal Page</h4>
            <img src="images/js_2.jpg" class="rounded-circle" alt="Nodestradamus">
            <div class="card-body">
                <p class="card-text">Log in to your personal page and view jobs that match you.</p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 col-sm-12">
        <div class="mb-3 text-center">
            <h4 class="card-title">Richer Job Ads</h4>
            <img src="images/js_3.jpg" class="rounded-circle" alt="Robbie">
            <div class="card-body">
                <p class="card-text">Get Salary Matching, Location Map and Company Insights</p>
            </div>
        </div>
    </div>			
</div>
</div>
<!-- End Speaker -->
@endsection