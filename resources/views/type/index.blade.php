@extends('adminlte::page')
@section('title', 'Client Type')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('status'))
            <?php 
            if($message == "Your data are successfully deleted"){
              $successorfail = "alert-danger";
            }else{
              $successorfail = "alert-success";
            }
            ?>
            
            <div class="alert {{$successorfail}} alert-dismissible fade show" role="alert">
              <strong>{{$message}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="my-1 float-left">Client Type</h4>
                    <div class="text-right float-right">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalScrollable">Add Client Type</button>
                    </div>
                </div>
               
                <div class="card-body">                <div class="row justify-content-between">
                    <div class="col-md-4 col-xs-12">
                        <a href="/type" class="btn btn-md btn-success">All Data</a>
                        
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <form action="/type" method="get" role="search" class="form-inline">
                              <input class="text mr-2 form-control" type="search" placeholder="Search" aria-label="Search" name="search_name">
                              <button class="btn btn-success" type="submit">Search</button>
                             
                              </form>
                        </div>
                    </div>
                  </div>
                    
                  <div class="form-group">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Client Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if(count($data) > 0)
                      @foreach($data as $value)
                      <tr>
                        <td> {{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>
                        <a href="type/{{$value->id}}" class="btn btn-xs btn-success"><i class="fa fa-eye p-1"></i></a>
                        <a href="type/{{$value->id}}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit p-1"></i></a>
                      <form action="/type/{{$value->id}}" method="post" style="display: inline-block;" onsubmit="return confirm('Are you sure to delete?')">
                          {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        
                          <button type="submit" class="btn btn-xs btn-danger"/><i class="fa fa-trash"></i>
                      
                      </form>
                      </td>
                    </tr>
                      @endforeach
                      @else
                      <tr>
                        <td class="alert alert-danger text-center" role="alert" colspan="3">There is no data</td>
                      </tr>
                      @endif
                </tbody>
            </table>
              <div class="float-right">
              @if(count($data) > 0) 
                {{$data->appends(request()->input())->links()}}
              @endif 
            </div>
              </div>
          </form>
      </div>
      <!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <form action="{{url('/type')}}" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Create Client Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
         
            @csrf
           
                <div class="form-group">
                    <label class="card-title float-left">Client Name</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Enter Name" name="name">
                </div>
              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>                        

  </div>
  <!-- <a href=""><i class="fas fa-trash"></i></a> -->
</div>
</div>
</div>
@endsection