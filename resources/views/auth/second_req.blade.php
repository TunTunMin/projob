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
                              <div class="line border border-primary m-0"></div>
                              <div class="step" data-target="#information-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                  <span class="bs-stepper-circle bg-primary">2</span>
                                </button>
                              </div>
                              <div class="line"></div>
                              <div class="step" data-target="#information-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                  <span class="bs-stepper-circle">3</span>
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
                                <h3>Boot your profile with your highest qualifications</h3>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="university">Institude/University*:</label>
                                    <input type="text" class="form-control" placeholder="Institude/University" name="university" id="university">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="university_location">Institude/University Location*</label>
                                    <input type="text" class="form-control" placeholder="Institude/University Location" name="university_location" id="university_location">
                                </div>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-5">
                                <div class="form-group" class="form-control">
                                    <label for="qualification">Qualification *:</label>
                                    <select name="qualification[]" id="qualification" class="form-control">
                                        <option value="1">Anwhere in Yangon</option>
                                        <option value="1">Anwhere in Mdy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="field_study">Field of Study *:</label>
                                    <select name="field_study" id="field_study" class="form-control">
                                        <option value="1">Anwhere in Yangon</option>
                                        <option value="1">Anwhere in Mdy</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="salary_unit">Graduated Date *</label>
                                            <select name="graduated_year" id="graduated_year" class="form-control">
                                                <option value="selected">Year</option>
                                                <option value="1960">1960</option>
                                                <option value="1961">1961</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-4 mt-2">
                                        <select name="graduated_month" id="graduated_month" class="form-control">
                                            <option value="selected">Month</option>
                                            <option value="jan">January</option>
                                            <option value="feb">February</option>
                                            <option value="nov">November</option>
                                            <option value="dec">December</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <input type="submit" value="Next" class="btn btn-warning">
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
</script>
@endpush
