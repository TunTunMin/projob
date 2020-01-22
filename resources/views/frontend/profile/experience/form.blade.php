<div class="form-group row">
    <label for="position_title" class="col-sm-3 col-form-label">Position Title <span class="required_color">*</span></label>
    <div class="col-sm-9">
        <input type="text" name="position_title" id="position_title" class="form-control" placeholder="Enter Your Position" required>
    </div>
</div>
<div class="form-group row">
    <label for="company_name" class="col-sm-3 col-form-label">Company Name <span class="required_color">*</span></label>
    <div class="col-sm-9">
        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter Company Name" required>
    </div>
</div>
<div class="form-group row">
    <label for="company_name" class="col-sm-3 col-form-label">Joined Duration <span class="required_color">*</span></label>
    <div class="col-sm-3">
        {!! Form::selectYear('duration_from_year',1960,date('Y'),null,['class' => 'form-control','placeholder' => 'Year','required'=> 'true','id' => 'duration_from_year']) !!}
    </div>
    <div class="col-sm-3">
        {!! Form::selectMonth('duration_from_month',null,['class' => 'form-control','placeholder' => 'Month','required'=> 'true','id' => 'duration_from_month']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-3 offset-md-3">
        <label for="">To</label>
    </div>
</div>
<div class="form-group row">


    <div class="col-sm-3 offset-md-3">

        {!! Form::selectYear('duration_to_year',1960,date('Y'),null,['class' => 'form-control durationtoyr','placeholder' => 'Year','id' => 'duration_to_year']) !!}
    </div>
    <div class="col-sm-3">
        {!! Form::selectMonth('duration_to_month',null,['class' => 'form-control durationtomonth','placeholder' => 'Month','id' => 'duration_to_month']) !!}
    </div>

    <div class="col-sm-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="present">
            <label class="form-check-label" for="present">
                Present
            </label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-3">
        {!! Form::label('specialization', "Specialization", ['class' => 'require']) !!}
    </div>
    <div class="col-9">
        {!! Form::select('specializations_id', $specializations, null, ['class' => 'form-control','required' => true, 'placeholder' => 'Specialization','id' => 'specializations']) !!}
    </div>

</div>
<div class="form-group row">
    <div class="col-3">
        {!! Form::label('role', "Role", ['class' => 'require']) !!}
    </div>
    <div class="col-9">
        <select name="role_id" id="role" class="form-control" required>
            <option value="">Role</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-3">
        {!! Form::label('country', 'Country', null) !!}
    </div>
    <div class="col-9">
        {!! Form::select('country', $nationality, null, ['class' => 'form-control','required' => true,'id' => 'country']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('industry', 'Industry', ['class' => 'col-3 require']) !!}
    <div class="col-9">
        {!! Form::select('industries_id', $industry, null, ['class'=> 'form-control','required' => true,'id' => 'industry']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('position_level', 'Position Level', ['class' => 'col-3 require']) !!}
    <div class="col-9">
        {!! Form::select('position_level', Config::get('helper.position_level'), null, ['class' => 'form-control', 'required' => true,'id' => 'position_level']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('monthly_salary', 'Monthly Salary', ['class' => 'col-3']) !!}
    <div class="col-3">
        {!! Form::select('currency_unit', Config::get('helper.units'), null, ['class' => 'form-control','required' => true]) !!}
    </div>
    <div class="col-6">
        {!! Form::number('monthly_salary', null , ['class' => 'form-control','min' => 0,'placeholder' => 'Enter Salary']) !!}
    </div>
</div>
