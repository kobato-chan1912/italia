<!DOCTYPE html>
<html lang="en">
@include("layouts.head", ["title" => env("WEB_NAME"). " - Bài viết trang chủ"])
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
                            <h3>Quản lý thẻ Head</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Home</a></li>
                                <li class="breadcrumb-item active">Sửa thẻ Head</li>
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
                                <h5>Thêm thẻ head</h5>
                            </div>
                            <form class="form theme-form" method="post" action="">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div>
                                                <textarea class="form-control" id="header" name="header" rows="10">{{$content}}</textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    {{--                                    <a href="{{route("post_outside_preview")}}" target="_blank"><button class="btn btn-secondary" type="button">Xem trước</button></a>--}}

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
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>

<script>
    CKEDITOR.replace( 'editor', {

        filebrowserBrowseUrl     : "{{ route('ckfinder_browser') }}",
        filebrowserImageBrowseUrl: "{{ route('ckfinder_browser') }}?type=Images&token=123",
        filebrowserFlashBrowseUrl: "{{ route('ckfinder_browser') }}?type=Flash&token=123",
        filebrowserUploadUrl     : "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files",
        filebrowserImageUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images",
        filebrowserFlashUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Flash",
    } );


</script>


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
