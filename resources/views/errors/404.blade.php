<!DOCTYPE html>
<html lang="it">

@include("webpage.layouts.head",
[
    "title" => 'Page not found - '. env("WEB_NAME") ,
    "og_des" => '' ,
    "og_title" => ''
])

<body>
@include("webpage.layouts.header")
<section class="body">
    <div class="banner">
        <div class="container">
            @include("layouts.search_box")
            <br>
            <div style="clear:both;"></div>
{{--            <span--}}
{{--                style="display:block; text-align:center;border-bottom:1px solid #ededed;margin-bottom:5px;">Advertisement</span>--}}

            <!-- yo-h -->
            <div style="clear:both;"></div>
            <br>
        </div>

    </div>
    <div class="container b_margin" style="margin-top: 0;">
        <!-- <div class="container">-->
        <div class="col-md-12 vtn-home">
            <div class="box gt-box">
                <br>
                <div id="container-cfq">

                    <div class="page-description summary">

                        <h1 class="gt-title page-title">

                            Error 404 - Page Not Found

                        </h1>


                    </div>
                    &nbsp; &nbsp; &nbsp; &nbsp;
                </div>

                <div class="gt-container" style="display:none;">
                    <!--//chen thong bao cho trang chu o day-->
                    Download free ringtone for all mobile devices with more than 95.000 ringtones such as <a
                        href="https://bestringtonesfree.net/funny-ringtones/">funny ringtone</a>, animal ringtone,
                    <a href="https://bestringtonesfree.net/bollywood/">Bollywood ringtone</a>, etc


                </div>
            </div>
        </div>


        <script>
            $(document).ready(function () {
                $("#btnViewMore").on("click", function (e) {
                    e.preventDefault();
                    $(".page-description").toggleClass("summary");
                    if ($(this).text() == "Lee mas") {
                        $(this).text("Esconder");
                    } else {
                        $(this).text("Lee mas");
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


{{--        <span--}}
{{--            style="display:block; text-align:center;border-bottom:1px solid #ededed;margin-bottom:5px;">Advertisement</span>--}}

        <!-- yo-s -->
        <br>

    </div>
</section>
@include("webpage.layouts.footer")

</body>

</html>
