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
                        <a href="#" onclick="editFunction({{$user_details->id}})" class="text-dark">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        @flashMessage(['show' => session()->has('status') ])
                            {{session()->get('status')}}
                        @endflashMessage
                    </div>
                    <div class="col-12">
                        <div class="row" id="show_additional_info">
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
                        <div class="row" id="hide_additional_info">
                            {!! Form::open(['url' => 'infoUpdate','method' => 'post']) !!}
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-3">
                                        {!! Form::label('monthly_salary', 'Expected Salary', ['class' => 'require']) !!}
                                    </div>
                                    <div class="col-3">
                                        {!! Form::select('currency_unit', Config::get('helper.units'), null, ['class' => 'form-control', 'id' => 'currency_unit']) !!}
                                    </div>
                                    <div class="col-6">
                                        {!! Form::text('monthly_salary', null, ['class' => 'form-control','required' => true,'placeholder' => 'Enter Your Expected Salary','id' => 'monthly_salary']) !!}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3">
                                        {!! Form::label('prefer_work', 'Preferred work location', ['class' => 'requre']) !!}
                                    </div>

                                    <div class="col-9">
                                        {!! Form::select('preferwork_location_id', $townships, null, ['class'=> 'form-control','required' => true,'id' => 'prefer_work']) !!}
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="user_detail_id">
                                <br>
                                <div class="col-sm-3 offset-md-3 mt-4">
                                    <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>

		    </div>
        </div>
    </div>
	</div>
</div>
@endsection
@push('css')
    <style>
        #hide_additional_info{
            display: none;
        }
        .require:after{
            content:'*';
            color:red;
        }
    </style>
@endpush
@push('js')
    <script>
        $('#prefer_work').select2({width: '100%'});
        $('#currency_unit').select2({width: '100%'});
        function editFunction(id){
            $('#show_additional_info').css('display','none');
            $('#hide_additional_info').css('display','block');
            $('#user_detail_id').val(id);
            $.ajax({
                url : '/editInfo/'+id,
                dataType: 'json',
                method: 'GET',
                success: function(response){
                    $('#monthly_salary').val(response.monthly_salary);
                    console.log(response.currency_unit);
                    $( "#currency_unit option:selected" ).val(response.currency_unit);
                    $( "#select2-currency_unit-container" ).text(response.currency_unit);
                }
            });
        }
    </script>
@endpush
