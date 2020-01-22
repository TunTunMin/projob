@extends('frontend.master')
@section('content')

@include('frontend.search_header')
<div class="container">
	<div class="row mt-3">
		@include('frontend.profile.sidebar')
		<!-- <div class="row ml-3"> -->
        <div class="col-md-9 col-lg-9 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <i class="fa fa-arrows-alt float-left mr-3 my-1" aria-hidden="true"></i>
                            <h5 class="float-left mr-3">Language</h5>
                            <a id="skill-edit-show" href="#" class="text-dark">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>

                        </div>
                        <div class="col-12 delete-success"></div>
                        <div class="col-12" id="hide-skills">
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-muted">
                                        Languages
                                    </p>
                                </div>
                                <div class="col-3">
                                    <p class="text-muted">
                                        Spoken
                                    </p>
                                </div>
                                <div class="col-3">
                                    <p class="text-muted">
                                        written
                                    </p>
                                </div>
                            </div>

                            @forelse ($languages as $key => $item)
                                <div class="row">
                                    <div class="col-6">
                                        <p>
                                            {{Config::get('helper.languages')[$item->language_id]}}
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <p>
                                            {{$item->spoken}}
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <p>
                                            {{$item->written}}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="row">

                                    <div class="col-12">
                                        <p>There are nothing skills</p>
                                    </div>
                                </div>
                            @endforelse

                        </div>

                        <div class="col-12" id="edit-skill">
                            <form class="repeater" action="{{route('languages.save')}}" method="POST">
                                @csrf
                                    <div data-repeater-list="languages">

                                        @forelse ($languages as $language)
                                            <div data-repeater-item>
                                                <div class="row my-3">
                                                        <input type="hidden" name="language_id" id="id" value="{{$language->id}}" >

                                                    <div class="col-6">
                                                        <label for="language">Languages <span class="required_color">*</span></label>
                                                        {!! Form::select('language', Config::get('helper.languages'), $language->language_id, ['class' => 'form-control language','id' => '']) !!}
                                                    </div>
                                                    <div class="col-2">
                                                        <label for="spoken">Spoken <span class="required_color">*</span></label>
                                                        <select name="spoken" id="" class="form-control spoken">
                                                            @for ($i = 0; $i < 11; $i++)
                                                                @if ($language->spoken == $i)
                                                                    <option value="{{$i}}" selected>{{$i}} </option>
                                                                @else
                                                                    <option value="{{$i}}">{{$i}} </option>
                                                                @endif

                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-2">
                                                        <label for="written">Written <span class="required_color">*</span></label>
                                                        <select name="written" class="form-control written">
                                                            @for ($i = 0; $i < 11; $i++)
                                                                @if ($language->written == $i)
                                                                    <option value="{{$i}}" selected>{{$i}} </option>
                                                                @else
                                                                    <option value="{{$i}}">{{$i}} </option>
                                                                @endif
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-2">
                                                        <label for=""></label><br>
                                                        <button class="btn btn-danger" type="button"  data-repeater-delete name="language_delete" id="language_delete">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>

                                                    </div>

                                                </div>
                                            </div>
                                        @empty
                                            <div data-repeater-item>
                                                <div class="row my-3">
                                                    <div class="col-6">
                                                        <label for="language">Languages <span class="required_color">*</span></label>
                                                        {!! Form::select('language', Config::get('helper.languages'), null, ['class' => 'form-control language']) !!}
                                                    </div>
                                                    <div class="col-2">
                                                        <label for="spoken">Spoken <span class="required_color">*</span></label>
                                                        <select name="spoken"  class="form-control spoken">
                                                            @for ($i = 0; $i < 11; $i++)
                                                                <option value="{{$i}}">{{$i}} </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-2">
                                                        <label for="written">Written <span class="required_color">*</span></label>
                                                        <select name="written" class="form-control written">
                                                            @for ($i = 0; $i < 11; $i++)
                                                                <option value="{{$i}}">{{$i}} </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-2">
                                                        <label for=""></label><br>
                                                        <button class="btn btn-danger" type="button"  data-repeater-delete onclick="skillsdelete();">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse


                                    </div>
                                    <button class="btn btn-success mb-2" data-repeater-create type="button"><i class="fas fa-plus"></i></button>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-warning">Cancel</a>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

		</div>
	</div>
</div>
@endsection
@push('css')
   <style>
       .required_color{
           color: red;
       }
       #edit-skill{
           display: none;
       }
    </style>
@endpush
@push('js')
<script src="{{asset('js/jquery-repeater.js')}}"></script>
<script>
     $(document).ready(function () {
        $('.repeater').repeater({
            show: function () {
                $(this).slideDown();
            }
        })
    });
    //  $('.language').select2({ width: '100%', placeholder: "Choose Language"});
    // $('.spoken').select2({ width: '100%'});
    // $('.written').select2({ width: '100%'});

    $('#skill-edit-show').on('click',function(){
        $('#hide-skills').css('display','none');
        $('#edit-skill').css('display','block');
    });
// Repeater Delete Method
    function languageDelete(index,e) {
        if(confirm("Are you sure you want to delete this?")){
            var language_id = $('#language_id'+index).val();
            $.ajax({
                method : 'GET',
                url :'/delete_language/'+language_id,
                success : function(data){
                    if (data.success) {
                        $('.delete-success').html("<div class='alert alert-success' role='alert'>Delete Successfully</div>");
                    }
                }
            })
        }
        else{
            e.stopImmediatePropagation();
             return false;
        }
        }
</script>
@endpush
