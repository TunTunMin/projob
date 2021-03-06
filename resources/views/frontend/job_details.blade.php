@extends('frontend.master')
@section('content')
@include('frontend.search_header')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <img src="{{asset('projob_images/'.$data->cover_photo)}}" alt="" class="card-img-top d-none d-xs-none d-sm-none d-md-block">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                        <img src="{{asset('projob_images/'.$data->logo)}}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h3>{{$data->title}}</h3>
                        <a href="#"><span class="d-block">{{$data->company}}</span></a>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-unstyled">
                               <li class="list-unstyled">
                               <i class="fas fa-map-marker-alt pr-1"></i> {{$data->location}}</li>
                               <li><i class="fas fa-dollar-sign mr-1 w-14"></i>Login to view Salary</li>

                               <li><i class="fas fa-calendar"></i>
                                    Min 2 years (Junior Executive) </li>
                               </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4><i class="far fa-edit"></i> JOB DESCRIPTION</h4>
                    <p>
                        {!! $data->job_description !!}
                    </p>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h4>Work Location</h4>
                    <h6><i class="fas fa-map-marker-alt"></i>Address</h6>
                    <p>
                        {{$data->location}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <i class="far fa-list-alt"></i>
                        RECRUITMENT FIRM SNAPSHOT
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Average Processing Time </h6>
                            <p>{{$data->average_processtime ?? '-'}}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>EA No.</h6>
                            <p>
                                {{$data->ea_no}}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>EA Reg ID</h6>
                            <p>
                                {{$data->ea_register_no}}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Industry</h6>
                            <p>
                                {{$data->industry}}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Website</h6>

                            @if ($data->website <> null)
                                <a href="{{$data->website}}" target="_blank">{{$data->website}}</a>
                            @else
                                -
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h6>Facebook Fan Page</h6>
                            @if ($data->facebook <> null)
                                <a  target="_blank" href="{{$data->facebook}}">{{$data->facebook}}</a>
                            @else
                                -
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h6>Company Size</h6>
                            <p>{{$data->company_size}}</p>
                        </div>
                    </div>
                </div>
            </div>

           @if (count(array_filter($data->gallery)) > 0)
           <div class="card mt-2">
            <div class="card-body">
                    <h4><i class="fas fa-camera-retro"></i> Company Photos</h4>

                    <div style="position:relative;top:0;left:0;width:100%;height:100%;overflow:hidden;">
                    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;">
                        <!-- Loading Screen -->
                        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="{{asset('images/spin.svg')}}" />
                        </div>
                        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                            @foreach ($data->gallery as $value)
                            <div>
                                <img data-u="image" src="{{asset('projob_images/'.$value)}}" />
                                <img data-u="thumb" src="{{asset('projob_images/'.$value)}}" />
                            </div>
                            @endforeach

                        </div>
                        <!-- Thumbnail Navigator -->
                        <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#000;" data-autocenter="1" data-scale-bottom="0.75">
                            <div data-u="slides">
                                <div data-u="prototype" class="p" style="width:190px;height:90px;">
                                    <div data-u="thumbnailtemplate" class="t"></div>
                                    <svg viewbox="0 0 16000 16000" class="cv">
                                        <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                                        <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                                        <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- Arrow Navigator -->
                        <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;" data-scale="0.75">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                                <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                                <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                            </svg>
                        </div>
                        <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;" data-scale="0.75">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                                <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                                <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                            </svg>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
           @endif
            <div class="card mt-2">
                <div class="card-body">
                    <h4><i class="far fa-building"></i> Company Overview</h4>
                    <p>{!! strip_tags($data->company_overview) !!}
                    </p>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection('content')
@push('css')
<link rel="stylesheet" href="{{asset('css/jssor-slider.css')}}">
<style>


 /* Medium devices (tablets, 768px and up) */
@media (min-width: 768px) {
    .card-img-top{
        height: 300px;

    }
 }
</style>
@endpush
@push('js')
<script src="{{asset('js/jssor.slider-28.0.0.min.js')}}" type="text/javascript"></script>

 <script type="text/javascript">
    window.jssor_1_slider_init = function() {

        var jssor_1_SlideshowTransitions = [
          {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
        ];

        var jssor_1_options = {
          $AutoPlay: 1,
          $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: jssor_1_SlideshowTransitions,
            $TransitionsOrder: 1
          },
          $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$
          },
          $ThumbnailNavigatorOptions: {
            $Class: $JssorThumbnailNavigator$,
            $SpacingX: 5,
            $SpacingY: 5
          }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 980;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    };
</script>
<script type="text/javascript">jssor_1_slider_init();
</script>
@endpush
