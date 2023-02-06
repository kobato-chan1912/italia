<!DOCTYPE html>
<html lang="en">
@php
    if(isset($post)){
    $titleHead = "Sửa bài viết";
    } else {
    $titleHead = "Thêm bài viết";
}
@endphp
@include("layouts.head", ["title" => env("WEB_NAME"). " - $titleHead"])
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
                            <h3>Quản lý bài viết</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{request("redirect")}}">Danh sách bài viết</a></li>
                                <li class="breadcrumb-item active">
                                    @if(isset($post))
                                    Sửa bài viết
                                        @else
                                    Thêm bài viết
                                        @endif
                                </li>
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
                                <h5>Nhập thông tin bài viết</h5>
                            </div>
                            <form class="form theme-form" method="post" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="title">Tiêu đề bài viết</label>
                                                <input class="form-control" id="title" name="title" placeholder="Nhập tiêu đề bài viết" @if(isset($post)) value="{{$post->title}}" @endif required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="slug">Slug của đường dẫn</label>
                                                <input class="form-control" id="slug" name="slug" placeholder="Ấn nút bên dưới để tự động tạo Slug" @if(isset($post)) value="{{$post->slug}}" @endif required>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-pill btn-danger" type="button" onclick="createSlug()">
                                                    Tạo slug tự động
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="thumb_image">Ảnh Cover của bài viết (để trống nếu không muốn up)</label>
                                                <b>*Kích thước ảnh khuyến cáo: 1200x450</b>
                                                <input class="form-control" type="file" id="thumb_image" name="thumb_image" placeholder="Chọn ảnh tại đây" accept="image/*" onchange="document.getElementById('preview_image').src = window.URL.createObjectURL(this.files[0]); @if(isset($post)) $('#hidden_url').val('new') @endif">
                                                <img style="padding-top: 20px;" id="preview_image" src="" width="10%" />
                                                <div class="mb-3" style="padding-top: 20px">
                                                    <button class="btn btn-pill btn-danger" type="button" onclick="document.getElementById('preview_image').src=''; $('#thumb_image').val(null); @if(isset($post)) $('#hidden_url').val('')  @endif  ">
                                                        Xóa ảnh
                                                    </button>
                                                </div>
                                                @if (!str_contains(URL::current(), "create"))
                                                    <input type="hidden" id="hidden_url" name="hidden_url" value="{{$post->thumb_url}}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="editor">Nội dung bài viết</label>
                                                    <textarea id="editor" name="editor">@if(isset($post)){{$post->content}} @endif</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top: 30px;">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="meta_title">Thẻ Title</label>
                                                <input class="form-control" id="meta_title" name="meta_title" placeholder="Nhập thẻ title" @if(isset($post)) value="{{$post->meta_title}}" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="meta_description">Thẻ Description</label>
                                                <input class="form-control" id="meta_description" name="meta_description" placeholder="Nhập thẻ Description" @if(isset($post)) value="{{$post->meta_description}}" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="display">Hiển thị bên ngoài</label>
                                                <select class="form-select digits" id="display" name="display">
                                                    <option value="1" selected>Hiển thị</option>
                                                    <option value="0">Ẩn</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button class="btn btn-primary" type="submit">Lưu</button>
                                        <a href="{{request("redirect")}}">
                                            <input class="btn btn-light" type="button" value="Quay về">
                                        </a>

                                    </div>

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
<script src="/assets/js/slug.js"></script>
<script>
    function createSlug(){
        let title = $("#title").val();
        $("#slug").val((slug(title)));
    }
@if(!str_contains(URL::current(), "create"))
    $("#display").val({{$post->display}})
    document.getElementById('preview_image').src = "{{$post->thumb_url}}"
@endif

</script>
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

</body>
</html>
