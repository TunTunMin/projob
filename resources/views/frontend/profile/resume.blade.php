@extends('frontend.profile.master')
@section('content')

@include('frontend.search_header')
<div class="container">
	<div class="row mt-3">
    @include('frontend.profile.sidebar')
    <div class="col-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <i class="fa fa-paperclip float-left mr-3 my-1" aria-hidden="true"></i>
                        <h6 class="float-left mr-3">Uploaded Resume</h6>

                    </div>
                    <div class="col-12 mt-4">
                        @flashMessage(['show' => session()->has('status') ])
                            {{session()->get('status')}}
                        @endflashMessage

                        @if($resume_file->resume == null)
                        <p>You have not uploaded your resume yet.
                        </p>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                               Upload Resume
                            </button>
                        @else
                            <div class="row">
                                <div class="col-3">
                                    <p class="text-muted">File Name</p>
                                </div>
                                <div class="col-9">
                                <a href="{{asset('/storage/resumes/'.$resume_file->resume)}}" target="_blank">
                                    {{$resume_file->resume}}
                                </a>
                            <form action="{{route('resumeDelete')}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="resume" value="{{$resume_file->resume}}">
                                <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return  confirm('Are you sure you want to delete this?');"><i class="far fa-trash-alt"></i></button>
                            </form>
                                </div>
                            </div>
                        @endif
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                   <form action="{{route('uploadresume')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Upload Resume</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="file" name="resume" id="" class="form-control" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Upload</button>
                                        </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	</div>
</div>
@endsection
