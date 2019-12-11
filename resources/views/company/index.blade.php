@extends('adminlte::page')
@section('title', 'Company')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('status'))
            <?php 
            if($message == "Your data are successfully deleted" ){
              $successorfail = "alert-danger";
            }elseif($message == "Don't delete this item because it has child elements"){
              $successorfail = "alert-warning";
            }
            else{
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
                    <h4 class="float-left my-1">Company</h4>
                    <div class="float-right">
                      <!-- Button trigger modal -->
                      <a href="/company/create" class="btn btn-success" >Add Company</a>
                    </div>
                </div> 
                
                <div class="card-body">      
                  <div class="row justify-content-between">
                      <div class="col-md-4 col-xs-12">
                          <a href="/company" class="btn btn-md btn-success">All Data</a> 
                          
                      </div>
                      <div class="col-md-4 col-xs-12">
                          <div class="form-group">
                              <form action="/company" method="get" role="search" class="form-inline">
                                  <input class="text mr-2 form-control" type="search" placeholder="Search" aria-label="Search" name="search_name" autocomplete="off">
                                  <button class="btn btn-success p-2" type="submit">Search</button>
                               
                                </form>
                          </div>
                      </div>
                  </div>
                    
                       
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Register No</th>
                        <th scope="col">Company Size</th>
                        <th scope="col">Location</th>
                        <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($data) > 0)
                  @foreach($data as $value)
                    <tr>
                        <td> {{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->register_no}}</td>
                        <td>{{$value->company_size}}</td>
                        <td>{{$value->location}}</td>
                        <td>
                        <a href="company/{{$value->id}}" class="btn btn-xs btn-success"><i class="fa fa-eye p-1"></i></a>
                        <a href="company/{{$value->id}}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit p-1"></i></a>
                        <form action="/company/{{$value->id}}" method="post" style="display: inline-block;"  onsubmit="return confirm('Are you sure to delete?')">
                            {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-xs btn-danger"/><i class="fa fa-trash"></i>
                        
                        </form>
                        </td>
                    </tr>
                  @endforeach
                  @else

                    <tr>
                      <td colspan="6" role="alert" class="alert alert-danger text-center">There is no data</td>
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
          
      </div>
      <!-- Modal -->
                     

  </div>
  <!-- <a href=""><i class="fas fa-trash"></i></a> -->
</div>
</div>
</div>
@stop
