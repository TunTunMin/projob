@extends('adminlte::page')
@section('title', 'Company')
@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header bg-info text-center">
                    <h4>Company Details</h4>
               </div>
               <div class="card-body">
                    <div class="row">
                        <label for="name" class="col-md-4 col-xs-12">Name:</label>
                        <div class="col-md-8 col-xs-12">
                        {{$company->name}}
                        </div>
                      
                        <label for="" class="col-md-4 col-xs-4">
                                Register No: 
                        </label>
                        <div class="col-md-8 col-xs-12">
                            {{$company->register_no}}
                        </div>

                        <label for="" class="col-md-4 col-xs-4">
                                EA No: 
                        </label>
                        <div class="col-md-8 col-xs-12">
                            {{$company->ea_no}}
                        </div>

                        <label for="" class="col-md-4 col-xs-4">
                                EA Register No: 
                        </label>
                        <div class="col-md-8 col-xs-12">
                            {{$company->ea_register_no}}
                        </div>

                        <label for="" class="col-md-4 col-xs-4">
                                Company Size: 
                        </label>
                        <div class="col-md-8 col-xs-12">
                            {{$company->company_size}}
                        </div>

                        <label for="" class="col-md-4 col-xs-4">
                                Company Overview: 
                        </label>
                        <div class="col-md-8 col-xs-12">
                            {!! $company->company_overview !!}
                        </div>

                        <label for="" class="col-md-4 col-xs-4">
                                Location: 
                        </label>
                        <div class="col-md-8 col-xs-12">
                            {!! $company->location !!}
                        </div>

                        <label for="" class="col-md-4 col-xs-4">
                                Industry: 
                        </label>
                        <div class="col-md-8 col-xs-12">
                            {!! $company->industry !!}
                        </div>

                        <label for="" class="col-md-4 col-xs-4">
                                Average Process Time: 
                        </label>
                        <div class="col-md-8 col-xs-12">
                            {!! $company->average_process_time !!}
                        </div>

                        <label for="" class="col-md-4 col-xs-4">
                                Benefits & Other: 
                        </label>
                        <div class="col-md-8 col-xs-12">
                            {!! $company->benefit_other !!}
                        </div>

                        <label for="" class="col-md-4 col-xs-4">
                                Logo: 
                        </label>
                        <div class="col-md-8 col-xs-12">
                        <img src="/projob_images/{{isset($company->logo) ? $company->logo : 'no-image.png'}}" alt="logo">
                        </div>

                        <label for="" class="col-md-4 col-xs-4">
                                Cover Photo: 
                        </label>
                        <div class="col-md-8 col-xs-12">
                            @if ($company->cover_photo)
                                <img src="/projob_images/{{$company->cover_photo}}" alt="cover_photo">
                            @else
                                No Image
                            @endif
                        </div>
                        
                    </div>
               </div>
           </div>
       </div>
    </div>
</div>
@endsection