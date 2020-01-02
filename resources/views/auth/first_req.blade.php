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
                        <div class="row">
                            <div class="col-md-5 text-center">
                                <button class="btn btn-outline-primary form-control">
                                        <i class="fas fa-briefcase"></i>
                                        I have work experience</button>
                            </div>
                            <div class="col-md-2 text-center align-middle">

                                <label class="align-self-cente">OR</label>
                            </div>
                            <div class="col-md-5 text-center">
                                <button class="btn btn-outline-primary form-control">
                                        <i class="fas fa-graduation-cap"></i> I am a student/ fresh graduate</button>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div class="col-md-5 text-center">
                                <div class="form-group">
                                    <label for="nationality">Nationality*:</label>
                                    <select name="nationality_id" id="nationality_id" class="form-control">
                                        <option value="">Choose Nationality*:</option>
                                        <option value="1">English</option>
                                        <option value="2">Myanmar</option>
                                       {{-- @forelse ($nationality as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                       @empty

                                       @endforelse --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5 text-center">
                                <div class="form-group">
                                    <label for="residing_in">Currently residing in *</label>
                                    <select name="current_resident" id="residing_in" class="form-control">
                                        <option value="1">Yangon</option>
                                        <option value="2">Singapore</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-5 text-center">
                                <div class="form-group">
                                    <label for="specializations">Preferred specializations *:</label>
                                    <select name="specialization[]" id="specialization" class="form-control"  multiple="multiple">
                                        <option value="1">Accountant</option>
                                        <option value="1">IT Software</option>
                                        <option value="2">IT Hardware</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5 text-center">
                                <div class="form-group">
                                    <label for="prefer_work_location">Preferred work locations *:</label>
                                    <select name="prefer_worklocation" id="prefer_worklocation" class="form-control">
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
                                            <label for="salary_unit">Monthly salary expectation</label>
                                            <select name="salary_unit" id="salary_unit" class="form-control">
                                                <option value="USD">USD</option>
                                                <option value="SGD">SGD</option>
                                                <option value="MYAN">MYAN</option>
                                                <option value="EUR">EUR</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="expected_salary">&nbsp;</label>
                                            <input type="text" class="form-control" placeholder="Expected Salary" name="expected_salary">
                                        </div>
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
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>
$('#nationality_id').select2();
$('#residing_in').select2();
$('#specialization').select2();
$('#prefer_worklocation').select2();
$('#salary_unit').select2();
</script>
@endpush
