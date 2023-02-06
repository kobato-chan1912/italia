<!DOCTYPE html>
<html lang="it">

@include("webpage.layouts.head",
[
    "title" => $og_title,
    "og_des" => $og_des,
    "og_title" => $og_title
])

<body>
@include("webpage.layouts.header")
<section class="body">
    <div class="banner">
        <div class="container">
            @include("layouts.search_box")
        </div>

    </div>
    <div class="container b_margin">
        <!-- <div class="container">-->
        <div class="col-md-12  gt-hidden ">
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
        </script><div class="col-md-8 col-sm-8 col-xs-12 pull-left">
            <div class="box column-3">
                &nbsp; &nbsp;<h1 class="title"><i class="fa fa-music" aria-hidden="true"></i> {{$title}} </h1>

                <ul class="list_apps">

                @foreach($songs as $song)
                        <li class="app_item">
                            <script type="text/javascript" defer>
                                var jQInit = jQInit || [];
                                jQInit.push(['myModule{{$song->id}}', function ($) {
                                    jQuery(window).on('load', function ($) {
                                        iniPlayer('{{$song->id}}', "{{$song->url}}");
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
                                <span><i class="fa fa-file-audio-o" aria-hidden="true"></i> {{$song->size}}</span>                            </div>
{{--                            <div class="developer"><i class="fa fa-eye" aria-hidden="true"></i> {{$song->listeners}}</div>--}}
                        </li>
                    @endforeach



                </ul>
            </div>
            <div class="wp-pagenavi" role="navigation">
                <span class="pages">Page @if(request()->has('page')) {{$page}} @else 1 @endif of {{$songs->lastPage()}}</span>
                @if($page == 1 || !isset($page))
                    @if($songs->lastPage()==1)

                        <a class="page smaller current" title="Page 1" href="{{$url}}1">1</a>

                    @else
{{--                        In first page--}}

                        <a class="page smaller current" title="Page 1" href="{{$url}}1">1</a>
                        <a class="page smaller" title="Page 2" href="{{$url}}2">2</a>
                        @if($songs->lastPage() >= 3)
                        <a class="page smaller" title="Page 3" href="{{$url}}3">3</a>
                        @endif
                        <a class="last" href="{{$url}}2">Next »</a>
                    @endif
                    @elseif(($page!=1) && ($page!=$songs->lastPage()))
                    <a class="first" href="{{$url}}{{$page-1}}">« Back</a>
                    <a class="page smaller" href="{{$url}}{{$page-1}}">{{$page-1}}</a>
                    <a class="page smaller current"  href="{{$url}}{{$page}}">{{$page}}</a>
                    <a class="page smaller" href="{{$url}}{{$page+1}}">{{$page+1}}</a>
                    <a class="last" href="{{$url}}{{$page+1}}">Next »</a>

                @else
                    <a class="first" href="{{$url}}{{$page-1}}">« Back</a>
                    <a class="page smaller" href="{{$url}}{{$page-1}}">{{$page-1}}</a>
                    <a class="page smaller current" href="{{$url}}{{$page}}">{{$page}}</a>
                    @endif
            </div></div>
        <div class="col-md-4 col-sm-4 col-xs-12" style="padding-top: 20px;">
            @include("webpage.layouts.right_1")


        </div>


    </div>
</section>
@include("webpage.layouts.footer")
<script src="https://pagination.js.org/dist/2.1.5/pagination.min.js"></script>

</body>

</html>
