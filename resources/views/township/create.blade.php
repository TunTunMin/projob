@extends('adminlte::page')
@section('title', 'Township')
@section('content')
<div class="container-fluid">
    <form method="post" action="/township">
        @csrf
    <div role="form">   
   <div class="form-group">
       <label>Name</label>
       <input type="text" name="name" class="form-control"/>
   </div>

   <div class="text-right"> <!--You can add col-lg-12 if you want -->
       <button type="submit" class="btn-info btn">Submit</button>
   </div>
</div>
    </form>
</div>
@endsection