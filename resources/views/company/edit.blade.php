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
                {!! Form::open(['route' => ['company.update',$company->id], 'files'=>true]) !!}
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="type">Type*:</label>
                                    <select name="type_id" id="type" class="form-control" required>
                                        @if (count($types) > 0)
                                        <option value="">Choose Type</option>
                                            @foreach ($types as $item)
                                                @if ($item->id == $company->type_id)
                                                    <option value="{{$item->id}}" selected>{{$item->name}}</option>  
                                                @else
                                                 <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endif
                                                
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="name">Name *:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required autocomplete="off" value="{{$company->name}}">
                                </div>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="overview">Company Overiew:</label>
                            <textarea name="company_overview" id="overview" cols="30" rows="10" placeholder="Enter Company Overview">{{$company->company_overview}}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="register_no">Register No:</label>
                                <input type="text" name="register_no" id="register_no" placeholder="Enter Register Number" class="form-control" value="{{$company->register_no}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="ea_no">EA No:</label>
                                <input type="text" name="ea_no" id="ea_no" placeholder="Enter EA Number" class="form-control" value="{{$company->ea_no}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="ea_register_no">EA Register No:</label>
                                <input type="text" name="ea_register_no" id="ea_register_no" placeholder="Enter EA Register Number" class="form-control" value="{{$company->ea_register_no}}">
                                </div>
                               
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="company_size">Company Size:</label>
                                    <input type="text" name="company_size" id="company_size" placeholder="Enter Company Size" class="form-control" value="{{$company->company_size}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="industry">Industry:</label>
                                    <input type="text" name="industry" id="industry" placeholder="Enter Industry" class="form-control" value="{{$company->industry}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="location">Location:</label>
                                    <input type="text" name="location" id="location" placeholder="Enter Location" class="form-control" value="{{$company->location}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="average_processtime">Average Process Time:</label>
                                    <input type="text" name="average_processtime" id="average_processtime" placeholder="Enter Average Process Time" class="form-control" value="{{$company->average_processtime}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="benefits_other">Benefits & Others:</label>
                                <input type="text" name="benefit_other" id="benefits_other" placeholder="Enter Benefits Other" class="form-control" value="{{$company->benefit_other}}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('logo', 'logo:') !!}
                            {!! Form::file('logo', ['class' => 'form-control','id' => 'logo']) !!}
                            <?php
                                if ($company->logo == null) {
                                   $logo = 'no-image.png';
                                }else{
                                    $logo = $company->logo;
                                }
                            ?>
                            <input type="hidden" name="logo_hidden" value="{{isset($company->logo) ? $company->logo : null}}" id="logo_original">
                            <input type="hidden" name="logo_del" id="logo_del">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="img-wrap" id="logo-del-display">
                                        @if ($logo <> 'no-image.png')
                                            <span class="close" onclick="remove_logo('{{$logo}}')">&times;</span>
                                        @endif
                                        <img id="logo_display" src="{{URL::asset('projob_images/'.$logo)}}" class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('cover_photo', 'Cover Photo:') !!}
                            {!! Form::file('cover_photo', ['class' => 'form-control', 'id' => 'cover_photo']) !!}
                            <?php
                                if ($company->cover_photo == null) {
                                $cover_photo = 'no-image.png';
                                }else{
                                    $cover_photo = $company->cover_photo;
                                }
                            ?>
                             <input type="hidden" name="cover_hidden" value="{{isset($company->cover_photo) ? $company->cover_photo : null}}" id="cover_original">
                             <input type="hidden" name="cover_del" id="cover_del">
                           <div class="row">
                               <div class="col-md-3">
                                    <div class="img-wrap" id="cover-del-display">
                                    
                                    @if ($cover_photo <> 'no-image.png')
                                        <span class="close" onclick="remove_cover('{{$cover_photo}}')">&times;</span>
                                    @endif
                                    <img id="cover_display" src="{{URL::asset('projob_images/'.$cover_photo)}}" class="img-fluid"/>
                                    </div>
                               </div>
                           </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('gallery', 'Gallery:') !!}
                            {!! Form::file('gallery[]', ['class' => 'form-control','id' => 'gallery', 'multiple' => true]) !!}
                            <input type="hidden" name="gallery_hidden" value="{{isset($company->gallery) ? $company->gallery : null}}" id="gallery_original">
                            <input type="hidden" name="gallery_del" id="gallery_del">
                            <div class="row" id="gallery_display">
                               
                            </div>
                          
                            <?php
                          
                            if (count(array_filter(json_decode($company->gallery))) < 1){
                                ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <img id="gallery_default_display" src="{{URL::asset('projob_images/no-image.png')}}" class="img-fluid"/>
                                </div>
                            </div>
                            <?php
                            
                            }else{
                                $gallery = json_decode($company->gallery);
                                ?>
                                <div class="row">
                                    @foreach ($gallery as $key => $item) 
                                    <div class="col-md-3" id="galleryhide{{$key}}">
                                        <div class="img-wrap gallery-del-display">
                                        <span class="close" onclick="remove_gallery('{{$item}}',{{$key}});">&times;</span>
                                        <img id="cover_display" src="{{URL::asset('projob_images/'.$item)}}" class="img-fluid"/>
                                        </div>
                                    </div>
                                    @endforeach   
                                    
                                </div>
                                <?php

                            }
                        ?>
                        
                        @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-danger ">Cancel</a>
                        <div class="float-right"> 
                            <button type="submit" class="btn-info btn">Update</button>
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
<link rel="stylesheet" href="{{asset('css/backend-module.css')}}">

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
      if ( status == 1) {
       
        $('#logo_display').attr('src', e.target.result);
      }else if( status == 2){
        $('#cover_display').attr('src', e.target.result);
      }else{
          
            $('#gallery_display').append('<div class="col-md-3"><img id="theImg" src="'+e.target.result+'" class="img-fluid" /></div>');
       
      }
    }
    reader.readAsDataURL(input.files[i]);
}
 
  }
}

$("#logo").change(function() {
$('#logo-del-display').css("display","block");
// $('#logo-del').show();
  readURL(this, 1);
});
$("#cover_photo").change(function() {
$('#cover-del-display').css("display","block");
// $('#cover_del').show();
  readURL(this, 2);
});
$("#gallery").change(function() {

$('#gallery_default_display').css("display","none");
$('#gallery_display').css("display","flex");
  readURL(this, 3);
});

function remove_logo(photo) {
    $('#logo_del').val(photo);
    $('#logo_original').val(null);
    $('#logo-del-display').hide();
}
function remove_cover(photo) {
    $('#cover_del').val(photo);
    $('#cover_original').val(null);
    $('#cover-del-display').hide();
}
var arr = new Array();
function remove_gallery(photo,key) {
    
    arr.push(photo);
    var unique = arr.filter(function(itm, i, arr) {
        return i == arr.indexOf(itm);
    });

    // existing array
    var exit_arr = $('#gallery_original').val();
    // console.log($.parseJSON(exit_arr));
   
    $('#gallery_del').val(JSON.stringify(unique));
    // console.log(JSON.stringify(unique));
    var item;

   
    const result = $.parseJSON(exit_arr).filter(value => value != photo);
    $('#gallery_original').val(JSON.stringify(result)); //after remove and set value to exitistance vlaue
    
    $('#galleryhide'+key).hide();
    
    
}


</script>

@stop
