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
                        <form action="{{route('secondpagesave')}}" method="POST">
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
                                </div>
                                <div class="col-md-12">
                                    <h3>Boot your profile with your highest qualifications</h3>
                                </div>
                            </div>
                            <div class="row py-4">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="university">Institude/University <span class="required_color">*</span></label>
                                       <input type="text" name="institute_university" id="university" class="form-control" required placeholder="Institute/ University">
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="university_location">Institude/University Location <span class="required_color">*</span></label>
                                        <select name="institute_location_id" id="university_location" class="form-control" required>
                                            <option value="">Institude/University Location</option>
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
                                    <div class="form-group" class="form-control">
                                        <label for="qualification">Qualification <span class="required_color">*</span></label>
                                        <select name="qualification_id" id="qualification" class="form-control">
                                            <option value="">Qualification </option>
                                            @forelse ($qualifications as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="field_study">Field of Study <span class="required_color">*</span></label>
                                        <select name="field_study_id" id="field_study" class="form-control">
                                            <option value="">Field of Study </option>
                                            @forelse ($field_studies as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="graduate_date_yr">Graduated Date <span class="required_color">*</span></label>

                                                {!! Form::selectYear('graduate_date_yr',1960,date('Y'),null,['class' => 'form-control','placeholder' => 'Year','required'=> 'true','id' => 'graduate_date_yr']) !!}

                                            </div>
                                        </div>
                                        <div class="col-md-6 pt-4 mt-2">
                                                {!! Form::selectMonth('graduate_date_month',null,['class' => 'form-control','placeholder' => 'Year','required'=> 'true','id' => 'graduate_date_month']) !!}
                                        </div>
                                        <input type="hidden" name="user_id" value="{{$user_id}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="float-right">
                                <input type="submit" value="Next" class="btn btn-warning">
                            </div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
            {{-- <div class="card">
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
                                    <label for="university">Institude/University <span class="required_color">*</span></label>
                                    <input type="text" class="form-control" placeholder="Institude/University" name="university" id="university">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="university_location">Institude/University Location <span class="required_color">*</span></label>
                                    <input type="text" class="form-control" placeholder="Institude/University Location" name="university_location" id="university_location">
                                </div>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-5">
                                <div class="form-group" class="form-control">
                                    <label for="qualification">Qualification <span class="required_color">*</span></label>
                                    <select name="qualification[]" id="qualification" class="form-control">
                                        <option value="1">Anwhere in Yangon</option>
                                        <option value="1">Anwhere in Mdy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="field_study">Field of Study <span class="required_color">*</span></label>
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
                                            <label for="salary_unit">Graduated Date <span class="required_color">*</span></label>
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
            </div> --}}
        </div>
    </div>
</div>
@stop
@push('css')

<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
<style>
/* required color */
.required_color{
    color: red;
}
</style>
@endpush
@push('js')

<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script>
    $(document).ready(function() {
//   $('#myModal').modal('show');
$('#myModal').modal({backdrop: 'static', keyboard: false})
});
$('#graduate_date_yr').select2({ width: '100%', placeholder: "Year"});
$('#graduate_date_month').select2({ width: '100%', placeholder: "Month"});
$('#university_location').select2({ width: '100%', placeholder: "Institude/University Location"});
$('#field_study').select2({ width: '100%', placeholder: "Field of Study"});
$('#qualification').select2({ width: '100%', placeholder: "Qualification    "});

</script>
@endpush
