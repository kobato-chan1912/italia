<section class="header">
    <nav class="navbar navbar-default navbar-static-top" style="background-color: {{'#'.env("BACKGROUND_COLOR")}}">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route("webPageIndex")}}" >
                    <img src="/webpage/images/logo_v3.png" alt="">
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse" style="background-color: {{'#'.env("BACKGROUND_COLOR")}}">
                <ul class="nav navbar-nav">
                    <li id="menu-item-4475"
                        class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-4475">
                        <a title="Portada" href="{{route("webPageIndex")}}">Home</a></li>
                    <li id="menu-item-4479"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4479 @if(URL::current()== route("newest")) active @endif"><a
                            title="&Uacute;ltimos" href="{{route("newest")}}"><span
                                class="glyphicon &Uacute;ltimos tonos de llamada"></span>&nbsp; Nuove Suonerie </a>
                    </li>
                    <li id="menu-item-4484"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4479 @if(URL::current()== route("popularSongs")) active @endif"><a
                            title="&Uacute;ltimos" href="{{route("popularSongs")}}"><span
                                class="glyphicon &Uacute;ltimos tonos de llamada"></span>&nbsp;Le migliori suonerie </a>
                    </li>

                    <li id="menu-item-4484"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4479 @if(URL::current() == env("WEBPAGE_URL"). "/whatsapp")) active @endif"><a
                            title="&Uacute;ltimos" href="{{route("lostMejores")}}"><span
                                class="glyphicon &Uacute;ltimos tonos de llamada"></span>&nbsp; Top Suonerie </a>
                    </li>

{{--                    <li id="menu-item-4494"--}}
{{--                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4494"><a--}}
{{--                            title="Los mejores" href="mejores-tonos-de-llamada.html"><span--}}
{{--                                class="glyphicon Los mejores tonos de llamada"></span>&nbsp;Los mejores</a></li>--}}
{{--                    <li id="menu-item-4493"--}}
{{--                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4493"><a--}}
{{--                            title="Populares" href="tonos-de-llamada-populares.html"><span--}}
{{--                                class="glyphicon Tonos de llamada populares"></span>&nbsp;Populares</a></li>--}}
{{--                    <li id="menu-item-10848"--}}
{{--                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10848"><a--}}
{{--                            title="iPhone" href="descargar-tonos-de-iphone.html">iPhone</a></li>--}}
                </ul>

            </div>
        </div>
    </nav>
</section>
