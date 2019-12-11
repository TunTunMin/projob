@extends('adminlte::page')
@section('title', 'Address')
@section('content')
<div class="container-fluid">
    <form method="post" action="/address">
        @csrf
        <div role="form">
            <div class="form-group">
                <label>Township Id</label>
                <select class="custom-select form-control" name="township_id" id="township_id" required>
                    <option selected value="">Choose Township</option>
                    @foreach ($townships as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label>Street Id</label>
                <select class="custom-select form-control" name="street_id" id="street_id" required>
                    <option selected value="">Choose Street</option>
                    @foreach ($streets as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="text-right"> <!--You can add col-lg-12 if you want -->
                <button type="submit" class="btn-info btn">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
