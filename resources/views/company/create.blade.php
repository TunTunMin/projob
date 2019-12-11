@extends('adminlte::page')
@section('title', 'Company')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="text-center">Add Company</h4>
                </div>
                {!! Form::open(['route' => 'company.store', 'files'=>true]) !!}
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="type">Type*:</label>
                                    <select name="type_id" id="type" class="form-control" required>
                                        @if (count($types) > 0)
                                        <option value="">Choose Type</option>
                                            @foreach ($types as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="name">Name *:</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="overview">Company Overiew:</label>
                            <textarea name="company_overview" id="overview" cols="30" rows="10" placeholder="Enter Company Overview"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="register_no">Register No:</label>
                                    <input type="text" name="register_no" id="register_no" placeholder="Enter Register Number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="ea_no">EA No:</label>
                                    <input type="text" name="ea_no" id="ea_no" placeholder="Enter EA Number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="ea_register_no">EA Register No:</label>
                                    <input type="text" name="ea_register_no" id="ea_register_no" placeholder="Enter EA Register Number" class="form-control">
                                </div>
                               
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="company_size">Company Size:</label>
                                    <input type="text" name="company_size" id="company_size" placeholder="Enter Company Size" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="industry">Industry:</label>
                                    <input type="text" name="industry" id="industry" placeholder="Enter Industry" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="location">Location:</label>
                                    <input type="text" name="location" id="location" placeholder="Enter Location" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="average_processtime">Average Process Time:</label>
                                    <input type="text" name="average_processtime" id="average_processtime" placeholder="Enter Average Process Time" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="benefits_other">Benefits & Others:</label>
                                    <input type="text" name="benefit_other" id="benefits_other" placeholder="Enter Benefits Other" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('logo', 'logo:') !!}
                            {!! Form::file('logo', ['class' => 'form-control','id' => 'logo']) !!}
                            <img id="logo_display" alt="" width="200px" height="80px" />
                        </div>
                        <div class="form-group">
                            {!! Form::label('cover_photo', 'Cover Photo:') !!}
                            {!! Form::file('cover_photo', ['class' => 'form-control','id' => 'cover_photo']) !!}
                            <img id="cover_display" alt="" width="200px" height="80px" />
                        </div>
                        <div class="form-group">
                            {!! Form::label('gallery', 'Gallery:') !!}
                            {!! Form::file('gallery[]', ['class' => 'form-control','id' => 'gallery', 'multiple' => true]) !!}
                           <div class="gallery_display">

                           </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-danger ">Cancel</a>
                        <div class="float-right"> 
                            <button type="submit" class="btn-info btn">Save</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="{{asset('css/summernote.css')}}">
<style>
    #logo_display, #cover_display,.gallery_display{
        display: none;
    }
</style>
@stop
@section('js')
<script src="{{asset('js/summernote.js')}}"></script>
<script> 
$(document).ready(function() {
  $('#overview').summernote();
});
function readURL(input, status) {
  if (input.files && input.files[0]) {
    var filesAmount = input.files.length;
   var i;
for (i = 0; i < filesAmount; i++) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
        // console.log(e.target);
      if ( status == 1) {
       
        $('#logo_display').attr('src', e.target.result);
      }else if( status == 2){
        $('#cover_display').attr('src', e.target.result);
      }else{
          
             $('.gallery_display').append('<img id="theImg" src="'+e.target.result+'" width="200px" height="80px" />');
        // $('.gallery_display').attr('src', e.target.result);
       
      }
    }
    reader.readAsDataURL(input.files[i]);
}

    
  }
}

$("#logo").change(function() {
$('#logo_display').css("display","block");
  readURL(this, 1);
});
$("#cover_photo").change(function() {
$('#cover_display').css("display","block");
  readURL(this, 2);
});
$("#gallery").change(function() {
$('.gallery_display').css("display","block");
  readURL(this, 3);
});
</script>

@stop
