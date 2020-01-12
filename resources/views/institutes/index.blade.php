@extends('adminlte::page')
@section('title', 'Institude/ University')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            @flashMessage(['show' => session()->has('status') ])
                {{session()->get('status')}}
            @endflashMessage

            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="float-left my-1">Institude/ University</h4>
                    <div class="float-right">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalScrollable">Add Institude/ University</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-4 col-xs-12">
                            <a href="/institude_locations" class="btn btn-md btn-success">All Data</a>

                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <form action="/institude_locations" method="get" role="search" class="form-inline">
                                    <input class="text mr-2 form-control" type="search" placeholder="Search" aria-label="Search" name="search_name">
                                    <button class="btn btn-success" type="submit">Search</button>

                                </form>
                            </div>
                        </div>
                    </div>

                  <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>

                                <a href="institutes/{{$value->id}}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit p-1"></i></a>
                                <form action="/institutes/{{$value->id}}" method="post" style="display: inline-block;"  onsubmit="return confirm('Are you sure to delete?')">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-xs btn-danger" /><i class="fa fa-trash"></i>

                                </form>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="alert alert-danger text-center" role="alert">
                                <span>There is no data!!!</span>
                            </td>
                        </tr>

                        @endforelse
                    </tbody>
                </table>
                <div class="float-right">
                    @if(count($data) > 0)
                        {{$data->appends(request()->input())->links()}}
                    @endif
                </div>

              </div>

      </div>
    </div>

</div>
</div>
      <!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <form action="{{url('/institutes')}}" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Create Field of Studies</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

            @csrf

            <div class="form-group">
                <label class="card-title float-left" for="name">Name *:</label>
                 <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required value="{{old('name')}}" autofocus>

            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary float-right">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

@stop
@push('js')

@endpush
