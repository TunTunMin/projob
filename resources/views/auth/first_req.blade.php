@extends('frontend.master')

@section('content')
<div class="container pt-5 pb-3 wrapper">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{route('firstpagesave')}}" method="POST">
                    @csrf
                <div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="myModal">
                    <div class="modal-dialog mw-100 w-75 modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-block text-center py-2">
                                <div class="d-flex justify-content-center">
                                    <h3 class="text-primary">Let your profile work for you</h3>
                                </div>
                                <h6 class="text-muted">Stay connected with relevant career opportunities</h6>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-5 text-center">
                                        <button class="btn btn-outline-primary form-control" id="work_experience" type="button">
                                                <i class="fas fa-briefcase"></i>
                                                I have work experience</button>
                                    </div>
                                    <div class="col-md-2 text-center align-middle">

                                        <label class="align-self-cente">OR</label>
                                    </div>
                                    <div class="col-md-5 text-center">
                                        <button class="btn btn-outline-primary form-control" id="fresh_graduate" type="button">
                                                <i class="fas fa-graduation-cap"></i> I am a student/ fresh graduate</button>
                                    </div>
                                </div>
                                <div class="row py-4">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="nationality">Nationality <span class="required_color">*</span></label>
                                            <select name="nationality_id" id="nationality_id" class="form-control" required>
                                                <option value="">Choose Nationality</option>

                                                @forelse ($nationality as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                @empty

                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="residing_in">Currently residing in<span class="required_color">*</span></label>
                                            <select name="current_resident_id" id="residing_in" class="form-control" required>
                                                <option value="">Residing</option>
                                                @forelse ($nationality as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                @empty

                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="specializations">Preferred specializations<span class="required_color">*</span></label>
                                            <select name="specializations_id" id="specialization" class="form-control"  required>
                                                <option value="">Specializations</option>
                                                @forelse ($specializations as $specialization)
                                                        <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                                                @empty

                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="work_location">Preferred work locations <span class="required_color">*</span></label>
                                            <select name="preferwork_location_id" id="work_location" class="form-control" required>
                                                <option value="">Add Location</option>
                                                @forelse ($townships as $township)
                                                    <option value="{{$township->id}}">{{$township->name}}</option>
                                               @empty

                                               @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-md-5">
                                            <label for="salary_unit">Monthly salary expectation<span class="required_color">*</span></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <select name="currency_unit" id="salary_unit" class="form-control" required>
                                                        @foreach (Config::get('helper.units') as $item)
                                                            <option value="{{$item}}">{{$item}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Expected Salary" name="monthly_salary" required>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="permanent_resident">Permanent Resident Of</label>
                                            <span class="required_color">*</span></label>
                                            <select name="permanent_resident_id" id="permanent_resident_id" class="form-control" required>
                                                <option value="">Add Country</option>
                                                @forelse ($townships as $township)
                                                    <option value="{{$township->id}}">{{$township->name}}</option>
                                               @empty

                                               @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5 align-self-end" id="show_since_year">
                                        <div class="row">
                                            <div class="col-md-12" >
                                                <div class="form-group">
                                                    <label for="since_year">Working Since<span class="required_color">*</span></label>
                                                    {!! Form::selectYear('working_since',1960,date('Y'),null,['class' => 'form-control','placeholder' => 'Year','required'=> 'true','id' => 'since_year']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <input type="hidden" name="user_id" value="{{$user_id}}">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="float-right">
                                    <input type="submit" value="Next" class="btn btn-md btn-warning">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@stop
@push('css')

<style>

</style>
@endpush
@push('js')

<script>
        $(document).ready(function() {
//   $('#myModal').modal('show');
$('#myModal').modal({backdrop: 'static', keyboard: false})
});

$('#nationality_id').select2({ width: '100%', placeholder: "Choose Nationality"});
$('#residing_in').select2({ width: '100%',placeholder: "Add Current Residing" });
$('#specialization').select2({ width: '100%',placeholder: "Add a specialization"});
$('#work_location').select2({ width: '100%', placeholder: "Add workLoacation" });
$('#salary_unit').select2({ width: '100%' });
$('#since_year').select2({width: '100%'});
// Working Since
$('#fresh_graduate').on('click',function(){
    $('#fresh_graduate').css({'color':'#fff','background-color':'#007bff','border-color':'#007bff'});
    $('#work_experience').css({
    'color': '#007bff',
    'background-color':'transparent',
    'background-image':'non',
    'border-color':'#007bf'
});
    $('#show_since_year').css('display','none');
    $('#since_year').attr('required', false);
});
$('#work_experience').on('click',function(){
    $('#work_experience').css({'color':'#fff','background-color':'#007bff','border-color':'#007bff'});
    $('#fresh_graduate').css({
    'color': '#007bff',
    'background-color':'transparent',
    'background-image':'non',
    'border-color':'#007bf'
});
    $('#show_since_year').css('display','block');
    $('#since_year').attr('required', true);
});

</script>
@endpush
