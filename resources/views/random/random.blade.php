<!DOCTYPE html>
<html lang="en">
@include("layouts.head", ["title" => env("WEB_NAME"). " - Cài đặt ngẫu nhiên"])
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
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Cài đặt ngẫu nhiên</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Home</a></li>
                                <li class="breadcrumb-item active">Sửa danh sách ngẫu nhiên</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h5>Đọc kĩ hướng dẫn và nhập thông tin bên dưới</h5>
                            </div>
                            <form class="form theme-form" method="post" action="{{URL::current()}}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div>
                                                <label class="form-label" for="random_title">Mỗi dòng sẽ là một câu trong danh sách ngẫu nhiên. Lưu ý để tránh kết quả bị rỗng, không nên để thừa dấu nháy ở hàng mới mà nên kết thúc dấu nháy tại từ cuối cùng.</label>
                                                <div class="note mb-3">
                                                    @if(str_contains(URL::current(), "/random-songs-description"))
                                                        <p class="txt-primary">Kí hiệu <code>$</code> đại diện cho tên bài hát cần thay thế</p>
                                                        <p class="txt-primary">Kí hiệu <code>#</code> đại diện cho tên danh mục cần thay thế</p>
                                                    @endif

                                                        @if(str_contains(URL::current(), "/random-songs-title"))
                                                            <p class="txt-primary">Kí hiệu <code>$</code> đại diện cho tên bài hát/danh mục cần thay thế</p>
                                                        @endif

                                                        @if(str_contains(URL::current(), "/random-categories-title"))
                                                            <p class="txt-primary">Kí hiệu <code>$</code> đại diện cho tên danh mục cần thay thế</p>
                                                        @endif
                                                </div>
                                                @if(str_contains(URL::current(), "/random-songs-description"))
                                                    <div class="mb-3">
                                                        <div>Ví dụ: Có danh sách là
                                                            <div style="font-style: italic;">
                                                                <code>
                                                                    <p>when an $ unknown printer took a # of
                                                                        <br>type and scrambled $ it to # man</p>
                                                                </code>
                                                            </div>
                                                        </div>
                                                        <div style="font-style: oblique;">Khi lấy random tiêu đề là <code>iPhone 13</code> và danh mục là <code>sonidos</code>,
                                                            kết quả sẽ là: <i>when an <code>iPhone 13</code> unknown printer took a <code>sonidos</code> of </i> hoặc <i>type and scrambled <code>iPhone 13</code> it to <code>sonidos</code> man </i> </div>
                                                    </div>
                                                @else
                                                <div class="mb-3">
                                                    <div>Ví dụ: Có danh sách là
                                                    <div style="font-style: italic;">
                                                        <code>
                                                        <p>when an $ unknown printer took a galley of
                                                            <br>type and scrambled $ it to 123</p>
                                                        </code>
                                                    </div>
                                                    </div>
                                                    <div style="font-style: oblique;">Khi lấy random tiêu đề là <code>iPhone 13</code>, kết quả sẽ là <i>when an <code>iPhone 13</code> unknown printer took a galley of</i> hoặc <i>type and scrambled <code>iPhone 13</code> it to 123 </i> </div>
                                                </div>
                                                @endif
                                                <textarea class="form-control" id="random_title" name="random_title" rows="10">{{$content}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                </div>
                            </form>
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
@include("layouts.jsloading")
@if(session()->get("message"))
    <script>

        swal({
            icon: 'success',
            title: 'Thành công!',
            text: '{{session()->get("message")}}',

        })


    </script>
@endif
</body>
</html>
