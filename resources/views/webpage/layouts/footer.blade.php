@php
    $sonidosCheck = \App\Models\Category::where("category_name", "Sonidos")->exists();
    if ($sonidosCheck == true){
        $sonidos = \App\Models\Category::where("category_name", "Sonidos")->first();
            if ($sonidos != null){
        $sonidosSongs = \App\Models\Song::where("category_id", $sonidos->id)->where("display", 1)->orderBy("downloads", "desc")->limit(6)->get();
        }
    }

@endphp
<section class="footer">
    <div class="container cat">
        <div class="category-list-footer">
            <div class="footer-header">
                <h2 class="footer-title"><i class="fa fa-music" aria-hidden="true"></i>  Tutti i generi </h2>
            </div>
            <ul class="cat-list">
                @php $categories = \App\Models\Category::where("display",1)->get(); @endphp
                @foreach($categories as $category)
                <li class="cat-li col-md-3 col-xs-6 col-sm-4"><a href="/{{$category->category_slug}}"
                                                                 title="alarma ringtone collection"><i class="fa fa-bell-o" aria-hidden="true"></i> {{$category->category_name}}
                        @php echo "(". \App\Models\Song::where("category_id", $category->id)->count(). ")"  @endphp</a> </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="container cat">
        <div class="category-list-footer">
            <div class="footer-header">
                <h2 class="footer-title"><i class="fa fa-book" aria-hidden="true"></i> Post </h2>
            </div>
            <ul class="cat-list">
                @php $posts = \App\Models\Post::where("display",1)->orderBy("id", "desc")->limit(5)->get(); @endphp
                @foreach($posts as $post)
                    <li class="cat-li col-md-3 col-xs-6 col-sm-4"><a href="/{{$post->slug}}"
                                                                     title="alarma ringtone collection"><i class="fa fa-book" aria-hidden="true"></i>
                            {{$post->title}}
                            </a> </li>
                @endforeach
{{--                @php $categories = \App\Models\Category::where("display",1)->get(); @endphp--}}
{{--                @foreach($categories as $category)--}}
{{--                    <li class="cat-li col-md-3 col-xs-6 col-sm-4 app_item">--}}
{{--                        <a href="tonos-de-llamada-alarma.html" title="alarma ringtone collection">--}}
{{--                            <div class="app_thumb">--}}
{{--                                <img width="20%" src="/wp-content/uploads/2020/07/logo.png" alt="">--}}
{{--                                <a href="soy-el-unico.html" class="app_name" title="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>--}}
{{--                            </div>--}}



{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
            </ul>
        </div>
    </div>

    <div class="about">
        <div class="container">
{{--            <div class="copyright">--}}
{{--                Derechos de autor 2022 <a href="/">Tonosmp3gratis.com</a>--}}
{{--            </div>--}}
            <div class="copyright">
                <a href="{{route("dashboard")}}"><img class="img-fluid" src="/webpage/images/logo_v3.png" width="250px" alt=""></a>
                <ul class="socials">
                    <li>
                        <a class="social-youtube"
                           href="javascript:void(0)"
                           target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 31.787 22.256">
                                <path
                                    d="M31.133-2.6a3.982,3.982,0,0,0-2.8-2.8c-2.487-.681-12.437-.681-12.437-.681s-9.95,0-12.437.655A4.063,4.063,0,0,0,.655-2.6,41.961,41.961,0,0,0,0,5.046a41.807,41.807,0,0,0,.655,7.646,3.983,3.983,0,0,0,2.8,2.8c2.513.681,12.437.681,12.437.681s9.95,0,12.437-.655a3.983,3.983,0,0,0,2.8-2.8,41.975,41.975,0,0,0,.654-7.646A39.832,39.832,0,0,0,31.133-2.6ZM12.726,9.811V.281L21,5.046Zm0,0"
                                    transform="translate(-0.001 6.082)" fill="#ffffff"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a class="social-facebook" href="javascript:void(0)"
                           target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24.266 24.266">
                                <path
                                    d="M24.266,12.133A12.133,12.133,0,1,0,12.133,24.266c.071,0,.142,0,.213,0V14.82H9.74V11.782h2.607V9.545a3.65,3.65,0,0,1,3.9-4,21.175,21.175,0,0,1,2.337.118V8.37H16.986c-1.256,0-1.5.6-1.5,1.474v1.934h3.01L18.1,14.816H15.484V23.8A12.137,12.137,0,0,0,24.266,12.133Z"
                                    fill="#ffffff"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a class="social-twitter" href="javascript:void(0)"
                           target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 23.947 19.457">
                                <path
                                    d="M23.947,50.3a10.235,10.235,0,0,1-2.829.775,4.882,4.882,0,0,0,2.16-2.713,9.811,9.811,0,0,1-3.113,1.188,4.909,4.909,0,0,0-8.492,3.357,5.055,5.055,0,0,0,.114,1.119A13.9,13.9,0,0,1,1.667,48.9a4.911,4.911,0,0,0,1.509,6.561,4.848,4.848,0,0,1-2.218-.6v.054a4.932,4.932,0,0,0,3.933,4.824,4.9,4.9,0,0,1-1.287.162,4.34,4.34,0,0,1-.929-.084,4.956,4.956,0,0,0,4.587,3.42,9.864,9.864,0,0,1-6.087,2.094A9.2,9.2,0,0,1,0,65.254a13.821,13.821,0,0,0,7.531,2.2A13.877,13.877,0,0,0,21.5,53.487c0-.217-.007-.427-.018-.635A9.794,9.794,0,0,0,23.947,50.3Z"
                                    transform="translate(0 -48)" fill="#ffffff"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a class="social-printerest" href="javascript:void(0)"
                           target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24.313 24.313">
                                <ellipse cx="12.157" cy="12.157" rx="12.157" ry="12.157" transform="translate(0 0)"
                                         fill="#fff"></ellipse>
                                <path
                                    d="M35.854,35.542a4.111,4.111,0,0,1-2.026-.964c-.4,2.078-.88,4.071-2.314,5.112-.443-3.141.65-5.5,1.157-8.005-.865-1.456.1-4.387,1.929-3.665,2.246.888-1.944,5.415.869,5.98,2.937.59,4.135-5.1,2.314-6.945-2.631-2.67-7.659-.061-7.041,3.762.151.934,1.116,1.218.386,2.507-1.684-.373-2.186-1.7-2.122-3.472a5.667,5.667,0,0,1,5.112-5.209c3.171-.355,6.148,1.165,6.559,4.148.462,3.367-1.432,7.013-4.823,6.751Z"
                                    transform="translate(-22.716 -19.264)"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a class="social-telegram" href="javascript:void(0)"  target="_blank">
                            <svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="24"
                                 height="24">
                                <path
                                    d="M46.137,6.552c-0.75-0.636-1.928-0.727-3.146-0.238l-0.002,0C41.708,6.828,6.728,21.832,5.304,22.445	c-0.259,0.09-2.521,0.934-2.288,2.814c0.208,1.695,2.026,2.397,2.248,2.478l8.893,3.045c0.59,1.964,2.765,9.21,3.246,10.758	c0.3,0.965,0.789,2.233,1.646,2.494c0.752,0.29,1.5,0.025,1.984-0.355l5.437-5.043l8.777,6.845l0.209,0.125	c0.596,0.264,1.167,0.396,1.712,0.396c0.421,0,0.825-0.079,1.211-0.237c1.315-0.54,1.841-1.793,1.896-1.935l6.556-34.077	C47.231,7.933,46.675,7.007,46.137,6.552z M22,32l-3,8l-3-10l23-17L22,32z">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a class="social-telegram" href="javascript:void(0)"  target="_blank">
                            <svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24"
                                 height="24">
                                <path xmlns="http://www.w3.org/2000/svg" d="M412.19,118.66a109.27,109.27,0,0,1-9.45-5.5,132.87,132.87,0,0,1-24.27-20.62c-18.1-20.71-24.86-41.72-27.35-56.43h.1C349.14,23.9,350,16,350.13,16H267.69V334.78c0,4.28,0,8.51-.18,12.69,0,.52-.05,1-.08,1.56,0,.23,0,.47-.05.71,0,.06,0,.12,0,.18a70,70,0,0,1-35.22,55.56,68.8,68.8,0,0,1-34.11,9c-38.41,0-69.54-31.32-69.54-70s31.13-70,69.54-70a68.9,68.9,0,0,1,21.41,3.39l.1-83.94a153.14,153.14,0,0,0-118,34.52,161.79,161.79,0,0,0-35.3,43.53c-3.48,6-16.61,30.11-18.2,69.24-1,22.21,5.67,45.22,8.85,54.73v.2c2,5.6,9.75,24.71,22.38,40.82A167.53,167.53,0,0,0,115,470.66v-.2l.2.2C155.11,497.78,199.36,496,199.36,496c7.66-.31,33.32,0,62.46-13.81,32.32-15.31,50.72-38.12,50.72-38.12a158.46,158.46,0,0,0,27.64-45.93c7.46-19.61,9.95-43.13,9.95-52.53V176.49c1,.6,14.32,9.41,14.32,9.41s19.19,12.3,49.13,20.31c21.48,5.7,50.42,6.9,50.42,6.9V131.27C453.86,132.37,433.27,129.17,412.19,118.66Z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
                <p>Copyright © <script>document.write(new Date().getFullYear())</script> by <a href="/">{{ env('WEB_NAME') }}</a></p>
            </div>


        </div>
    </div>

    <div class="footer-28-03-2022" style="display: none">
        <h3> <a href="http://istanbulescortiletisim.com" target="_blank">istanbul escort</a> <a
                href="http://istanbulescortnil.com" target="_blank">istanbul escort</a> <a
                href="http://istanbulescortpartner.com" target="_blank">istanbul escort</a> <a
                href="http://istanbulescorts.org" target="_blank">istanbul escort</a> <a
                href="http://istanbulescortbayan.net" target="_blank">istanbul escort</a> <a
                href="http://vipistanbulescorts.com" target="_blank">istanbul escort</a> <a
                href="http://istanbulescortagency.com" target="_blank">istanbul escort</a> <a
                href="http://istanbulescortbayan.com" target="_blank">istanbul escort</a> </h3>
    </div>
    <script type="text/javascript" src="/webpage/js/js-wp-embed.min.js"></script>
    @include("webpage.layouts.jsloading")
</section>
