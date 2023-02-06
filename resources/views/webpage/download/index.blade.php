<!DOCTYPE html>
<html lang="it">
@php $category = \App\Models\Category::where("id", $song->category_id)->first() @endphp

@include("webpage.layouts.head",
[
    "og_title" => "Scarica tono di chiamata MP3 $category->category_name $song->title",
    "og_des" => "",
    "title" => "Scarica tono di chiamata MP3 $category->category_name $song->title"
])

<body>
@include("webpage.layouts.header")
<section class="body">
    <div class="banner">
        @include("layouts.search_box")

    </div>
    <div class="container b_margin">
        <!-- <div class="container">-->
        <div class="col-md-12 ">
            <div class="box gt-box">

                <div class="gt-container" style="display:none;">


                </div>
            </div>
        </div>


        <script>
            $(document).ready(function () {
                $("#btnViewMore").on("click", function(e) {
                    e.preventDefault();
                    $(".page-description").toggleClass("summary");
                    if ($(this).text() == "Estendere") {
                        $(this).text("Crollo");
                    } else {
                        $(this).text("Estendere");
                    };
                });
            });

            // jQuery(document).ready(function($){
            // 	$("#btnViewMore").on("click", function(e) {
            // 		e.preventDefault();
            // 		$(".page-description").toggleClass("summary");
            // 		if ($(this).text() == "Lee mas") {
            // 			$(this).text("Esconder");
            // 		} else {
            // 			$(this).text("Lee mas");
            // 		};
            // 	});
            // });
        </script>
        <link rel="stylesheet" href="/webpage/css/download.css">
        <div class="container">

            <div class="rowx" style="margin-top: 25px;">
                <div class="">
                    <div class="box">

                        <div class="title single-breadcrumb">
                            <p id="breadcrumbs" style="font-size: 10pt">
                        <span>
                            <span>
                                <a href="/">Home</a> »
                                <span> <a href="/{{$category->category_slug}}">{{$category->category_name}}</a>                                    »
                                    <a href="/{{$song->slug}}">{{$song->title}}</a> »
                                    <span class="breadcrumb_last" aria-current="page">Download</span>
                                </span>
                            </span>
                        </span>
                            </p>

                        </div>
                        <div class="post_container">

                            <div class="post_head">
                                <h1 class="post_name">Scarie {{$song->title}}</h1>
                                <script>
                                    var jQInit = jQInit || [];
                                    jQInit.push(['jPlayerModule', function($) {
                                        function waitForJPlayerSingle() {
                                            var to = null;
                                            //if(typeof jPlayer !='undefined'){
                                            jQuery("#jquery_jplayer_1").jPlayer({
                                                ready: function(event) {
                                                    $(this).jPlayer("setMedia", {
                                                        //title: "",
                                                        mp3: "{{route("dlDownload"). "?id=" .$song->id}}"
                                                    });
                                                },
                                                swfPath: "/wp-content/themes/ringtone/js/jplayer/circleplayer/js",
                                                supplied: "mp3",
                                                wmode: "window",
                                                useStateClassSkin: true,
                                                autoBlur: false,
                                                smoothPlayBar: true,
                                                keyEnabled: true,
                                                remainingDuration: true,
                                                toggleDuration: true

                                            });
                                            //clearTimeout(to);
                                            //} else {
                                            //	console.log('wait jplayer');
                                            //	to= setTimeout( waitForJPlayerSingle, 20 );
                                            //}
                                        }
                                        jQuery(window).on('load', function() {
                                            jQuery('.jp-play').click(function(e) {
                                                e.preventDefault();
                                                jQuery('.cp-pause').click();

                                            });
                                            jQuery('.cp-play').click(function(e) {
                                                e.preventDefault();
                                                //togglePause();
                                                //$('.jp-stop').trigger('click');
                                                jQuery("#jquery_jplayer_1").jPlayer("stop");
                                            });
                                            waitForJPlayerSingle();
                                            jQuery('#btnModal').click(function(e) {
                                                e.preventDefault();
                                                jQuery('#exampleModal').modal('show');
                                            });

                                        });

                                    }]);
                                </script>
                                <div id="jquery_jplayer_1" class="jp-jplayer" style="width: 0px; height: 0px;"><img id="jp_poster_0" style="width: 0px; height: 0px; display: none;"><audio id="jp_audio_0" preload="metadata" src="{{route("dlDownload"). "?id=" .$song->id}}"></audio></div>
                                <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player" style="">
                                    <div class="jp-type-single">
                                        <div class="jp-gui jp-interface">
                                            <div class="jp-controls">
                                                <button class="jp-play" role="button" tabindex="0">play</button>
                                                <button class="jp-stop" role="button">stop</button>
                                            </div>
                                            <div class="jp-progress">
                                                <div class="jp-seek-bar" style="width: 100%;">
                                                    <div class="jp-play-bar" style="width: 0%;"></div>
                                                </div>
                                            </div>
                                            <div class="jp-volume-controls">
                                                <button class="jp-mute" role="button" tabindex="0">mute</button>
                                                <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
                                                <div class="jp-volume-bar">
                                                    <div class="jp-volume-bar-value" style="width: 80%;"></div>
                                                </div>
                                            </div>
                                            <div class="jp-time-holder">
                                                <div class="jp-current-time" role="timer" aria-label="time">00:00</div>
                                                <div class="jp-duration" role="timer" aria-label="duration">-00:40</div>
                                                <div class="jp-toggles">
                                                    <button class="jp-repeat" role="button" tabindex="0">repeat</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--	<div class="jp-details">
                <div class="jp-title" aria-label="title">&nbsp;</div>
            </div>-->
                                        <div class="jp-no-solution" style="display: none;">
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <div class="text">
                            </div>
                        </div>
                        <br>
                        <div style="clear:both;"></div>
{{--                        <span style="display:block; text-align:center;border-bottom:1px solid #ededed;margin-bottom:5px;">Advertisement</span>--}}

                        <!-- yo_link-s -->

                        <div style="clear:both;"></div>
                        <br>


                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog" role="document" style="max-width:490px; width:95%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">{{$song->title}} ringtone download</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row" style="text-align:center;">
                                        <div class="col-md-6">
                                            <a href="{{route("dlDownload"). "?id=" .$song->id}}" style="padding: 8px;margin-top: 10px;" class="btn_download btn btn-success" target="_blank" rel="nofollow" title="Download {{$song->title}}">Download MP3<i class="fa fa-download" style="padding: 0 6px 0 6px; color:#fff; margin-left: 3px;"></i></a>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="download-section">
                    <div id="download-ringtone" class="overlay">
                        <div class="title-download">
                            <h2>Scaricare {{$song->title}} </h2>
                        </div>


                        <div class="popup">
                            <p class="title-report">Scaricare</p>
                            <div class="download-count-down" style="display: none;">0</div>
                            <div class="popup-content" style="display: flex;">


                                <div class="box-cross mb-20">
                                    <div class="bc-title">{{$song->title}} Scaricare</div>
                                    <div class="bc-body wrap-box-mod">
                                        <div class="wrapcontent">

                                        </div>
                                        <div class="links">
                                            <div class="item item-obb">
                                                <span>MP3 File:</span>
                                                <a href="{{route("dlDownload"). "?id=" .$song->id}}" class="btn btn-green">Scaricare mp3</a>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="post_qrcode">
                                    <img src="https://chart.googleapis.com/chart?chs=130x130&amp;cht=qr&amp;chl={{env("WEBPAGE_URL").$song->url}}" title="qr code link" alt="scan qr code to download">
                                </div>
                                <!-- end bk -->
                            </div>
                        </div>
                        <div class="download-err">
                            <span>Se il download non parte entro pochi secondi, </span> <a href="{{route("dlDownload"). "?id=" .$song->id}}">clicca qui!</a>
                        </div>
                    </div>
                </div>
                <div class="box column-3">
                    <h3 class="title">{{$category->category_name}} Potrebbe piacerti anche</h3>
                    <ul class="list_apps in_postx">
                        @foreach($similarSongs as $song)
                            <li class="app_item">
                                <script type="text/javascript" defer>
                                    var jQInit = jQInit || [];
                                    jQInit.push(['myModule{{$song->id}}', function ($) {
                                        jQuery(window).on('load', function ($) {
                                            iniPlayer('{{$song->id}}', "{{route("dlDownload"). "?id=" .$song->id}}");
                                        });
                                    }]);
                                </script>
                                <div class="app_thumb">
                                    <div id="jquery_jplayer_{{$song->id}}" class="cp-jplayer"></div>
                                    <div id="cp_container_{{$song->id}}" class="cp-container">
                                        <div class="cp-buffer-holder">
                                            <!-- .cp-gt50 only needed when buffer is > than 50% -->
                                            <div class="cp-buffer-1"></div>
                                            <div class="cp-buffer-2"></div>
                                        </div>
                                        <div class="cp-progress-holder">
                                            <!-- .cp-gt50 only needed when progress is > than 50% -->
                                            <div class="cp-progress-1"></div>
                                            <div class="cp-progress-2"></div>
                                        </div>
                                        <div class="cp-circle-control"></div>
                                        <ul class="cp-controls">
                                            <li><a href="#" class="cp-play cp-play-{{$song->id}}" tabindex="1">play</a></li>
                                            <li><a href="#" class="cp-pause cp-pause-{{$song->id}}" style="display:none;"
                                                   tabindex="1">pause</a></li>
                                            <!-- Needs the inline style here, or jQuery.show() uses display:inline instead of display:block -->
                                        </ul>
                                    </div>
                                </div>
                                <a href="/{{$song->slug}}" class="app_name" title="">{{$song->title}}</a>
                                <div class="starsx">
                                    <span><i class="fa fa-eye" aria-hidden="true"></i> {{$song->listeners}}</span>
                                    <span><i class="fa fa-download" aria-hidden="true"></i> {{$song->downloads}}</span>
                                    <span><i class="fa fa-file-audio-o" aria-hidden="true"></i> {{$song->size}}</span>
                                    <a href="/{{$song->slug}}" class="btn_download" rel="nofollow" title=""></a>
                                </div>
{{--                                <div class="developer"><i class="fa fa-eye" aria-hidden="true"></i> {{$song->listeners}}</div>--}}
                            </li>
                        @endforeach
                    </ul>
                    <br>
                    <div style="clear:both;"></div>
{{--                    <span style="display:block; text-align:center;border-bottom:1px solid #ededed;margin-bottom:5px;">Advertisement</span>--}}

                    <!-- yo-h -->

                    <div style="clear:both;"></div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <script>
        // function on() {
        //   document.getElementById("overlay").style.display = "block";
        // }

        // function off() {
        //   document.getElementById("overlay").style.display = "none";
        // }

        var counter = 5;
        jQuery('.popup-content').hide();
        var interval = setInterval(function() {
            jQuery('.download-count-down').html(counter);

            if (counter == 0) {
                clearInterval(interval);
                jQuery('.download-count-down').hide();
                jQuery('.popup-content').show();
                document.querySelector('.download-err a').href = '{{route("dlDownload"). "?id=" .$song->id}}">';
            } else {
                jQuery('.download-count-down').show();
            }
            counter--;

        }, 1000);
    </script>

</section>
@include("webpage.layouts.footer")
<script src="https://pagination.js.org/dist/2.1.5/pagination.min.js"></script>

</body>

</html>
