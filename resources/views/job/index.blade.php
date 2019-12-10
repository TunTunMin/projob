@extends('adminlte::page')
@section('title', 'Job')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="float-left my-1">Job</h4>
                    <div class="float-right">
                      <!-- Button trigger modal -->
                      <a href="/job/create" class="btn btn-success" >Add Job</a>
                    </div>
                </div> 
                
                <div class="card-body">      
                  <div class="row justify-content-between">
                      <div class="col-md-4 col-xs-12">
                          <a href="/job" class="btn btn-md btn-success">All Data</a> 
                          
                      </div>
                      <div class="col-md-4 col-xs-12">
                          <div class="form-group">
                              <form action="/job" method="get" role="search" class="form-inline">
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
                        <th scope="col">Title</th>
                        <th scope="col">Post Date</th>
                        <th scope="col">Salary </th>
                        <th scope="col">Company</th>
                        {{-- <th scope="col">Job Type</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($data) > 0)
                  @foreach($data as $value)
                    <tr>
                        <td> {{$value->id}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{date('d m Y h:i:s',strtotime($value->post_date))}}</td>
                        <td>{{$value->salary_from}} - {{$value->salary_to}} {{$value->salary_unit}}</td>
                        <td>
                            @if ($value->getCompany <> null)
                                {{$value->getCompany->name}}
                            @endif
                        </td>
                        {{-- <td>
                            @if ($value->getJobType <> null)
                                {{$value->getJobType->name}}
                            @endif
                        </td> --}}
                        
                        <td>
                        <a href="job/{{$value->id}}" class="btn btn-xs btn-success"><i class="fa fa-eye p-1"></i></a>
                        <a href="job/{{$value->id}}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit p-1"></i></a>
                        <form action="/job/{{$value->id}}" method="post" style="display: inline-block;"  onsubmit="return confirm('Are you sure to delete?')">
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
              {{-- @if(count($data) > 0) 
                {{$data->appends(request()->input())->links()}}
              @endif  --}}
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