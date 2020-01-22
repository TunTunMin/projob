@extends('frontend.profile.master')
@section('content')

@include('frontend.search_header')
<div class="container">
	<div class="row mt-3">
	@include('frontend.profile.sidebar')

		<div class="col-md-9 col-lg-9 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <i class="fa fa-arrows-alt float-left mr-3 my-1" aria-hidden="true"></i>
                            <h5 class="float-left mr-3">Skills</h5>
                            <a id="skill-edit-show" href="#" class="text-dark">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>

                        </div>
                        <div class="col-12 delete-success"></div>
                        <div class="col-12" id="hide-skills">
                            @forelse ($group_skills as $key => $item)
                                <div class="row">
                                <div class="col-3">
                                    <p class="text-muted">
                                            {{Config::get('helper.skill_level')[$key]}}
                                    </p>
                                </div>
                                <div class="col-9">
                                    <p>
                                    <?php $count = count($item); ?>
                                    @forelse ($item as $detail_item)

                                            {{$detail_item->name}}
                                       @if ($count > 1)
                                        ,
                                       @endif
                                    <?php $count--; ?>
                                    @empty
                                    </p>
                                    @endforelse
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
                        <form class="repeater" action="{{route('skills.save')}}" method="POST">
                            @csrf
                                <div data-repeater-list="skills">

                                    @forelse ($skills as $skill)
                                        <div data-repeater-item>
                                            <div class="row my-3">
                                                    <input type="hidden" name="skill_id" id="skill_id" value="{{$skill->id}}" data-del-skill>
                                                <div class="col-6">

                                                    <input type="text" name="name"  class="form-control" required placeholder="Enter Your skill" value="{{$skill->name}}"/>
                                                </div>
                                                <div class="col-4">
                                                    {!! Form::select('skill_level', Config::get('helper.skill_level'), $skill->position_level, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-danger" type="button"  data-repeater-delete name="skill_delete" id="skill_delete">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>

                                                </div>

                                            </div>
                                        </div>
                                    @empty
                                        <div data-repeater-item>
                                            <div class="row my-3">

                                                <div class="col-6">

                                                    <input type="text" name="name"  class="form-control" required placeholder="Enter Your skill" value="{{old('name')}}"/>
                                                </div>
                                                <div class="col-4">
                                                    {!! Form::select('skill_level', Config::get('helper.skill_level'), old('position_level'), ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-danger" type="button"  data-repeater-delete>
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
@endsection
@push('css')
   <style>
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
    $('#skill-edit-show').on('click',function(){
        // alert('afafafaf');
        $('#hide-skills').css('display','none');
        $('#edit-skill').css('display','block');
    });
    function skillDelete(index,e) {
        if(confirm("Are you sure you want to delete this?")){
            var skill_id = $('#skill_id'+index).val();
            $.ajax({
                method : 'GET',
                url :'/delete_skill/'+skill_id,
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
