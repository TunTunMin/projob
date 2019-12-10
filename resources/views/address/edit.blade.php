@extends('adminlte::page')
@section('title', 'Type')
@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header bg-info text-center">
                   <h4>Edit Address</h4>
               </div>
               <form method="post" action="/address/{{$address->id}}">
                @csrf
                @method('put')
               <div class="card-body">
                    <div role="form">
                        <div class="form-group">
                            <label>Township Id</label>
                            <select class="custom-select form-control" name="township_id" id="township_id" required>
                                <option selected value="">Choose Township</option>
                                @foreach ($township as $item)
                                @if ($item->id == $address->township_id)
                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                @else 
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Street Id</label>
                            <select class="custom-select form-control" name="street_id" id="street_id" required>
                                <option selected value="">Choose Street</option>
                                @foreach ($street as $item)
                                @if ($item->id == $address->street_id)
                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        
                        
                    </div>
                    
               </div>
               <div class="card-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-danger ">Cancel</a>
                    <div class="float-right"> 
                        <button type="submit" class="btn-info btn">Update</button>
                    </div>
               </div>
                </form>
           </div>
       </div>
   </div>
</div>
@endsection
