@extends('frontend.master')

@section('content')
<div class="container pt-5 pb-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center py-2">
                    <h4 class="text-primary">Let your profile work for you</h4>
                    <p class="text-muted">Stay connected with relevant career opportunities</p>
                </div>
                <div class="card-body">
                    <form action="">
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
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Stand out your work experiece</h3>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="position_title">Position Title*:</label>
                                    <input type="text" class="form-control" name="position_title" id="position_title">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="company_name">Company Name *</label>
                                    <input type="text" class="form-control" placeholder="Institude/University Location" name="company_name" id="company_name">
                                </div>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-12">
                                <div class="form-group" class="form-control">
                                    <label for="qualification">Joined Duration*:</label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <select name="graduated_year" id="graduated_year" class="form-control">
                                                <option value="selected">Year</option>
                                                <option value="1960">1960</option>
                                                <option value="1961">1961</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select name="graduated_month" id="graduated_month" class="form-control">
                                                <option value="selected">Month</option>
                                                <option value="jan">January</option>
                                                <option value="feb">February</option>
                                                <option value="nov">November</option>
                                                <option value="dec">December</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1 pt-1">
                                            <span>To</span>
                                        </div>
                                        <div class="col-md-2 end-date">
                                            <select name="graduated_year" id="graduated_year" class="form-control">
                                                <option value="selected">Year</option>
                                                <option value="1960">1960</option>
                                                <option value="1961">1961</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 end-date">
                                            <select name="graduated_month" id="graduated_month" class="form-control">
                                                <option value="selected">Month</option>
                                                <option value="jan">January</option>
                                                <option value="feb">February</option>
                                                <option value="nov">November</option>
                                                <option value="dec">December</option>
                                            </select>
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
                                    <label for="specialization">Specialization *:</label>
                                    <select name="specialization[]" id="specialization" class="form-control">
                                        <option value="1">Anwhere in Yangon</option>
                                        <option value="1">Anwhere in Mdy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="role">Role *:</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="1">Anwhere in Yangon</option>
                                        <option value="1">Anwhere in Mdy</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-5">
                                <div class="form-group" class="form-control">
                                    <label for="industry">Industry *:</label>
                                    <select name="industry[]" id="industry" class="form-control">
                                        <option value="1">Anwhere in Yangon</option>
                                        <option value="1">Anwhere in Mdy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="position_level">Position Level *:</label>
                                    <select name="position_level" id="position_level" class="form-control">
                                        <option value="1">Anwhere in Yangon</option>
                                        <option value="1">Anwhere in Mdy</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  Allow relevant employers to search for your profile and view contact details
                                </label>
                              </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-5">
                                <div class="form-group" class="form-control">
                                    <label for="industry">Mobile number *:</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <select name="country_code" id="country_code" class="form-control">
                                                <option value="">Country Code</option>
                                                <option value="95">+95</option>
                                                <option value="65">+65</option>
                                                <option value="008">008</option>
                                            </select>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="position_title" id="position_title" placeholder="Country Code+Number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <input type="submit" value="Save" class="btn btn-primary">
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
$('#nationality_id').select2();
$('#residing_in').select2();
$('#specialization').select2();
$('#prefer_worklocation').select2();
$('#salary_unit').select2();
$(document).ready(function(){
    $('.end-date').css('display','none');
    $('#present').on('change', function(){
        if ($('#present').is(":checked"))
        {
        $('.end-date').hide();
        }else{
            $('.end-date').show();
        }
    });
});
</script>
@endpush
