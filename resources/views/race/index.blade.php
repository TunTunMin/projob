@extends('adminlte::page')
@section('title', 'Type')
@section('content')
<div class="container">

<div class="card">
    <div class="card-header bg-info">
      <h4 class="float-left my-1">Race</h4>
      <button class="btn btn-primary float-right" role="button" data-toggle="modal" data-target="#exampleModal">Add New Race</button>
    </div>
    <div class="card-body">
        <div class="row justify-content-between">
          <div class="col-md-4 col-xs-12">
              <a href="/race" class="btn btn-success btn-md">All Data</a>
              
          </div>
          <div class="col-md-4 col-xs-12">
              <div class="form-group">
                  <form class="form-inline" action="/street" method="GET">
                    <input class="form-control mr-sm-2" type="search" name="search_term" value="{{Request::get('search_term')}}" placeholder="Search" aria-label="Search" value="{{Request::get('search_term  ')}}">
                      <button class="btn btn-success mr-sm-4" type="submit">Search</button>
                  </form>
              </div>
          </div>
        </div>
      <table class="table ">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if($data->count() > 0)
            @foreach($data as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>
                <a href="/race/{{$item->id}}/edit" class="btn btn-xs btn-primary"><i class="far fa-edit p-1"></i></a>
              <form action="/race/{{$item->id}}" class="d-inline" method="post" onsubmit="return confirm('Are you sure to delete?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-xs btn-danger"><i class="far fa-trash-alt p-1"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="alert alert-danger text-center" role="alert" colspan="4">There is no data</td>
              </tr>
          @endif
          </tbody>
        </table>
        <div class="float-right">
            {{$data->appends(request()->input())->links()}}
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Race</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="/race">
              @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Name *:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" autocomplete="off"/>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>
  </div>



</div>
@endsection