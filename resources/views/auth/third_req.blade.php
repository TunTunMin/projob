@extends('frontend.master')

@section('content')
<div class="container pt-5 pb-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Modal -->
            <div class="modal bd-example-modal-lg" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="false" id="myModal">
                    <div class="modal-dialog mw-100 w-75 modal-lg" role="document">

                        <!-- Modal content-->
                        <div class="modal-content">
                        <form action="{{route('thirdpagesave')}}" method="POST">
                            @csrf
                            <div class="modal-header d-block text-center">
                                <div class="d-flex justify-content-center">
                                    <h3 class="modal-title text-primary">Let your profile work for you</h3>
                                </div>

                                <h6 class="modal-title pl-2 text-muted">Stay connected with relevant career opportunities</h6>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="bs-stepper">
                                            <div class="bs-stepper-header" role="tablist">
                                                <!-- your steps here -->
                                                <div class="step" data-target="#logins-part">
                                                    <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                        <span class="bs-stepper-circle bg-primary">1</span>
                                                    </button>
                                                </div>
                                                <div class="line border border-primary"></div>
                                                <div class="step" data-target="#information-part">
                                                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                        <span class="bs-stepper-circle bg-primary">2</span>
                                                    </button>
                                                </div>
                                                <div class="line border border-primary"></div>
                                                <div class="step" data-target="#information-part">
                                                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                        <span class="bs-stepper-circle bg-primary">3</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="bs-stepper-content">
                                                <!-- your steps content here -->
                                                <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger"></div>
                                                <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Stand out your work experiece</h3>
                                    </div>
                                </div>
                                <div class="row py-4">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="position_title">Position Title  <span class="required_color">*</span></label>
                                            <input type="text" class="form-control" name="position_title" id="position_title" placeholder="Position Title" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="company_name">Company Name  <span class="required_color">*</span></label>
                                            <input type="text" class="form-control" placeholder="Institude/University Location" name="company_name" id="company_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-md-12">
                                        <div class="form-group" class="form-control">
                                            <label for="join_duration_yr">Joined Duration <span class="required_color">*</span></label>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    {!! Form::selectYear('duration_from_yr',1960,date('Y'),null,['class' => 'form-control','placeholder' => 'Year','required'=> 'true','id' => 'join_duration_yr']) !!}
                                                </div>
                                                <div class="col-md-2">
                                                    {!! Form::selectMonth('duration_from_month',null,['class' => 'form-control','placeholder' => 'Year','required'=> 'true','id' => 'duration_from_month']) !!}
                                                </div>
                                                <div class="col-md-1 pt-1">
                                                    <span>To</span>
                                                </div>
                                                <div class="col-md-2 end-date">
                                                    {!! Form::selectYear('duration_to_yr',1960,date('Y'),null,['class' => 'form-control durationtoyr','placeholder' => 'Year','id' => 'duration_to_yr']) !!}
                                                </div>
                                                <div class="col-md-2 end-date">
                                                    {!! Form::selectMonth('duration_to_month',null,['class' => 'form-control durationtomonth','placeholder' => 'Year','id' => 'duration_to_month']) !!}
                                                </div>
                                                <div class="col-md-2 pt-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="present" checked>
                                                        <label class="form-check-label" for="present">
                                                            Present
                                                        </label>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-md-5">
                                        <div class="form-group" class="form-control">
                                            <label for="specialization">Specialization  <span class="required_color">*</span></label>

                                            {!! Form::select('sepcializations_id', $specializations, null, ['class' => 'form-control','required' => true, 'placeholder' => 'Specialization','id' => 'specialization']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="role">Role  <span class="required_color">*</span></label>
                                            <select name="role_id" id="role" class="form-control" required>
                                                <option value="">Role</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-md-5">
                                        <div class="form-group" class="form-control">
                                            <label for="industry">Industry  <span class="required_color">*</span></label>
                                            {!! Form::select('industries_id', $industries, null, ['class' => 'form-control','required' => true, 'placeholder' => 'Industry','id' => 'industry']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="position_level">Position Level  <span class="required_color">*</span></label>
                                            {!! Form::select('position_level', $position_level, null, ['class' => 'form-control','id' => 'position_level','placeholder' => 'Position Level','required' => true]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                   <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Allow relevant employers to search for your profile and view contact details
                                            </label>
                                        </div>
                                   </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-md-5">
                                        <div class="form-group" class="form-control">
                                            <label for="industry">Mobile number  <span class="required_color">*</span></label>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <select name="country_code" id="country_code" class="form-control">
                                                        <option value="">Country Code</option>
                                                        <option value="95">+95</option>
                                                        <option value="65">+65</option>
                                                        <option value="008">+064</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Country Code+Number">
                                                </div>
                                            <input type="hidden" name="user_id" value="{{$user_id}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="float-right">
                                    <input type="submit" value="Complete" class="btn btn-warning">
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
        </div>
    </div>
</div>
@stop
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script>
  $(document).ready(function() {
    $('#myModal').modal({backdrop: 'static', keyboard: false})
});
$('#join_duration_yr').select2({ width: '100%', placeholder: "Year"});
$('#duration_from_month').select2({ width: '100%', placeholder: "Month"});
$('#duration_to_yr').select2({ width: '100%', placeholder: "Year"});
$('#duration_to_month').select2({ width: '100%', placeholder: "Month"});
$('#specialization').select2({ width: '100%', placeholder: "Specialization"});
$('#role').select2({ width: '100%', placeholder: "Role"});
$('#industry').select2({ width: '100%', placeholder: "Industry"});
$('#position_level').select2({ width: '100%', placeholder: "Position Level"});
$(document).ready(function(){
    $('.end-date').css('display','none');
    $('#present').on('change', function(){
        if ($('#present').is(":checked"))
        {
        $('.durationtoyr').attr('required',false);
        $('.durationtomonth').attr('required',false);
        $('.end-date').hide();
        }else{
            $('.durationtoyr').attr('required',true);
            $('.durationtomonth').attr('required',true);
            $('.end-date').show();
        }
    });

    $('#specialization').on('change',function(){
        // console.log($(this).val());
        $.ajax({
            url: '/changerole/'+$(this).val(),
            type: 'GET',
            success: function(response){
                var roles = "";
                $.each(response,function(key, val){
                    roles += "<option value="+val.id+">"+val.name+"</option>";
                });
                $('#role').html(roles);
            }
        });
    });
});
</script>
@endpush
