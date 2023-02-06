<!DOCTYPE html>
<html lang="en">
@include("layouts.head", ["title" => env("WEB_NAME"). " - Dashboard"])
<body>
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    @include("layouts.header")
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
        @include("layouts.sidebar")
        <!-- Page Sidebar Ends-->
        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid general-widget">
                <div class="row">
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i data-feather="book-open"></i></div>
                                    <div class="media-body"><span class="m-0">Số bài viết</span>
                                        <h4 class="mb-0 counter">@php echo \App\Models\Post::count() @endphp</h4><i class="icon-bg" data-feather="book-open"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <div class="bg-secondary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i data-feather="music"></i></div>
                                    <div class="media-body"><span class="m-0">Số bài nhạc</span>
                                        <h4 class="mb-0 counter">@php echo \App\Models\Song::count() @endphp</h4><i class="icon-bg" data-feather="music"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i data-feather="folder"></i></div>
                                    <div class="media-body"><span class="m-0">Số danh mục</span>
                                        <h4 class="mb-0 counter">@php echo \App\Models\Category::count() @endphp</h4><i class="icon-bg" data-feather="folder"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i data-feather="headphones"></i></div>
                                    <div class="media-body"><span class="m-0">Tổng lượt nghe</span>
                                        <h4 class="mb-0 counter">@php echo \App\Models\Song::sum("listeners") @endphp</h4><i class="icon-bg" data-feather="headphones"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 xl-100 box-col-12">
                        <div class="card">
                            <div class="cal-date-widget card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
                                        <div class="cal-info text-center">
                                            <div>
                                                <h2>{{$date->day}}</h2>
                                                <div class="d-inline-block"><span class="b-r-dark pe-3">{{$date->month}}</span><span class="ps-3">{{$date->year}}</span></div>
                                                <p class="f-16">Yêu chính là muốn ở bên một người, không muốn xa người đó dù chỉ là một giây.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
                                        <div class="cal-datepicker">
                                            <div class="datepicker-here float-sm-end" data-language="en">           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 xl-50 col-sm-6 box-col-6">
                        <div class="card">
                            <div class="mobile-clock-widget">

                                <div>
                                    <ul class="clock" id="clock">
                                        <li class="hour" id="hour"></li>
                                        <li class="min" id="min"></li>
                                        <li class="sec" id="sec"></li>
                                    </ul>
                                    <div class="date f-24 mb-2" id="date"><span id="monthDay"></span><span id="year">, </span></div>
                                    <div>
                                        <p class="m-0 f-14 text-light">Thành phố Hồ Chí Minh, Việt Nam                                            </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 xl-50 col-sm-6 box-col-6">
                        <div class="card">
                            <div class="weather-widget-two">
                                <div id="weatherapi-weather-widget-4"></div><script type='text/javascript' src='https://www.weatherapi.com/weather/widget.ashx?loc=2731085&wid=4&tu=2&div=weatherapi-weather-widget-4' async></script><noscript><a href="https://www.weatherapi.com/weather/q/thanh-pho-ho-chi-minh-2731085" alt="Hour by hour Thanh Pho Ho Chi Minh weather">10 day hour by hour Thanh Pho Ho Chi Minh weather</a></noscript>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 xl-100 box-col-12">
                        <div class="card">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h5>TOP 5 bài được nghe nhiều</h5>
                            </div>
                            <div class="card-body">
                                <div class="user-status table-responsive">
                                    <table class="table table-bordernone">
                                        <thead>
                                        <tr>
                                            <th scope="col">Tiêu đề</th>
                                            <th scope="col">Danh mục</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Số lượt nghe</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($topSongs as $song)
                                        <tr>
                                            <td class="f-w-600">{{$song->title}}</td>
                                            <td>{{$song->category->category_name}}</td>
                                            @if($song->display == 0)
                                            <td class="font-secondary">Ẩn</td>
                                            @else
                                                <td class="font-primary">Hiển thị</td>
                                                @endif
                                            <td>
                                                <div class="span badge rounded-pill pill-badge-primary">{{$song->listeners}}</div>
                                            </td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#products-cart" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                    <pre><code class="language-html" id="products-cart">&lt;div class="card"&gt;
 &lt;div class="card-header pb-0 d-flex justify-content-between align-items-center"&gt;
   &lt;h5&gt;PRODUCTS CART&lt;/h5&gt;
   &lt;div class="setting-list"&gt;
     &lt;ul class="list-unstyled setting-option"&gt;
       &lt;li&gt;
         &lt;div class="setting-primary"&gt;&lt;i class="icon-settings"&gt;&lt;/i&gt;&lt;/div&gt;
       &lt;/li&gt;
       &lt;li&gt;&lt;i class="view-html fa fa-code font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
       &lt;li&gt;&lt;i class="icofont icofont-error close-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
     &lt;/ul&gt;
   &lt;/div&gt;
 &lt;/div&gt;
 &lt;div class="card-body"&gt;
   &lt;div class="user-status table-responsive"&gt;
     &lt;table class="table table-bordernone"&gt;
       &lt;thead&gt;
         &lt;tr&gt;
           &lt;th scope="col"&gt;Details&lt;/th&gt;
           &lt;th scope="col"&gt;Quantity&lt;/th&gt;
           &lt;th scope="col"&gt;Status&lt;/th&gt;
           &lt;th scope="col"&gt;Price&lt;/th&gt;
         &lt;/tr&gt;
       &lt;/thead&gt;
       &lt;tbody&gt;
         &lt;tr&gt;
           &lt;td class="f-w-600"&gt;Simply dummy text of the printing&lt;/td&gt;
           &lt;td&gt;1&lt;/td&gt;
           &lt;td class="font-primary"&gt;Pending&lt;/td&gt;
           &lt;td&gt;
             &lt;div class="span badge rounded-pill pill-badge-secondary"&gt;6523&lt;/div&gt;
           &lt;/td&gt;
         &lt;/tr&gt;
         &lt;tr&gt;
           &lt;td class="f-w-600"&gt;Long established&lt;/td&gt;
           &lt;td&gt;5&lt;/td&gt;
           &lt;td class="font-secondary"&gt;Cancle&lt;/td&gt;
           &lt;td&gt;
             &lt;div class="span badge rounded-pill pill-badge-success"&gt;6523&lt;/div&gt;
           &lt;/td&gt;
         &lt;/tr&gt;
         &lt;tr&gt;
           &lt;td class="f-w-600"&gt;sometimes by accident&lt;/td&gt;
           &lt;td&gt;10&lt;/td&gt;
           &lt;td class="font-secondary"&gt;Cancle&lt;/td&gt;
           &lt;td&gt;
             &lt;div class="span badge rounded-pill pill-badge-warning"&gt;6523&lt;/div&gt;
           &lt;/td&gt;
         &lt;/tr&gt;
         &lt;tr&gt;
           &lt;td class="f-w-600"&gt;Classical Latin literature&lt;/td&gt;
           &lt;td&gt;9&lt;/td&gt;
           &lt;td class="font-primary"&gt;Return&lt;/td&gt;
           &lt;td&gt;
             &lt;div class="span badge rounded-pill pill-badge-primary"&gt;6523&lt;/div&gt;
           &lt;/td&gt;
         &lt;/tr&gt;
         &lt;tr&gt;
           &lt;td class="f-w-600"&gt;keep the site on the Internet&lt;/td&gt;
           &lt;td&gt;8&lt;/td&gt;
           &lt;td class="font-primary"&gt;Pending&lt;/td&gt;
           &lt;td&gt;
               &lt;div class="span badge rounded-pill pill-badge-danger"&gt;6523&lt;/div&gt;
           &lt;/td&gt;
         &lt;/tr&gt;
         &lt;tr&gt;
             &lt;td class="f-w-600"&gt;Molestiae consequatur&lt;/td&gt;
             &lt;td&gt;3&lt;/td&gt;
             &lt;td class="font-secondary"&gt;Cancle&lt;/td&gt;
             &lt;td&gt;
               &lt;div class="span badge rounded-pill pill-badge-info"&gt;6523&lt;/div&gt;
             &lt;/td&gt;
         &lt;/tr&gt;
         &lt;tr&gt;
           &lt;td class="f-w-600"&gt;Pain can procure&lt;/td&gt;
           &lt;td&gt;8&lt;/td&gt;
           &lt;td class="font-primary"&gt;Return&lt;/td&gt;
           &lt;td&gt;
             &lt;div class="span badge rounded-pill pill-badge-primary"&gt;6523&lt;/div&gt;
           &lt;/td&gt;
         &lt;/tr&gt;
       &lt;/tbody&gt;
     &lt;/table&gt;
   &lt;/div&gt;
 &lt;/div&gt;
&lt;/div&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include("layouts.footer")
    </div>
</div>
<!-- latest jquery-->
<script src="/assets/js/jquery-3.5.1.min.js"></script>
<!-- feather icon js-->
<script src="/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="/assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="/assets/js/sidebar-menu.js"></script>
<script src="/assets/js/config.js"></script>
<!-- Bootstrap js-->
<script src="/assets/js/bootstrap/popper.min.js"></script>
<script src="/assets/js/bootstrap/bootstrap.min.js"></script>
<!-- Plugins JS start-->
<script src="/assets/js/prism/prism.min.js"></script>
<script src="/assets/js/clipboard/clipboard.min.js"></script>
<script src="/assets/js/counter/jquery.waypoints.min.js"></script>
<script src="/assets/js/counter/jquery.counterup.min.js"></script>
<script src="/assets/js/counter/counter-custom.js"></script>
<script src="/assets/js/custom-card/custom-card.js"></script>
<script src="/assets/js/datepicker/date-picker/datepicker.js"></script>
<script src="/assets/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="/assets/js/datepicker/date-picker/datepicker.custom.js"></script>
<script src="/assets/js/owlcarousel/owl.carousel.js"></script>
<script src="/assets/js/general-widget.js"></script>
<script src="/assets/js/height-equal.js"></script>
<script src="/assets/js/tooltip-init.js"></script>
<script src="/assets/js/notify/bootstrap-notify.min.js"></script>
<script src="/assets/js/notify/index.js"></script>

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="/assets/js/script.js"></script>
<script src="/assets/js/theme-customizer/customizer.js"></script>

<!-- login js-->
<!-- Plugin used-->
</body>
</html>
