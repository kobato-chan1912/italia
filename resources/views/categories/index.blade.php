<!DOCTYPE html>
<html lang="en">
@include("layouts.head", ["title" => env("WEB_NAME"). " - Danh sách danh mục"])
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
    @include("layouts.header_search")
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
                            <div class="page-header-left">
                                <h3>Quản lý danh mục</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Home</a></li>
{{--                                    <li class="breadcrumb-item">Pages    </li>--}}
{{--                                    <li class="breadcrumb-item">Ecommerce</li>--}}
                                    <li class="breadcrumb-item active">Danh sách danh mục</li>
                                </ol>
                            </div>
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

                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#category_modal"
                                        data-whatever="@mdo" onclick='$("#category").trigger("reset"); $("#category").attr("method", "post"); $("#category").attr("action", ""); '>
                                    <i class="fa fa-folder" style="padding-right: 4px;"></i>
                                    Thêm danh mục
                                </button>

                                @include("layouts.filter_button")

                                <div class="modal fade" id="category_modal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">Danh mục mới</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="" id="category">
                                                @csrf
                                                <div class="modal-body">

                                                    <div class="mb-3">
                                                        <label class="col-form-label"
                                                               for="recipient-name">Tên danh mục:</label>
                                                        <input class="form-control" type="text" id="category_name" name="category_name"
                                                               required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label"
                                                               for="description">Slug danh mục:</label>
                                                        <input class="form-control" type="text" id="category_slug" name="category_slug" required>
                                                    </div>
                                                    <div class="mb-3">
                                                    <button class="btn btn-pill btn-danger" type="button" onclick="createSlug()">
                                                        Tạo slug tự động
                                                    </button>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label"
                                                               for="category_meta_title">Meta title:</label>
                                                        <input class="form-control" type="text" id="category_meta_title" name="category_meta_title" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label"
                                                               for="category_meta_description">Meta description:</label>
                                                        <input class="form-control" type="text" id="category_meta_description" name="category_meta_description" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <button class="btn btn-pill btn-danger" type="button" onclick="createMeta()">
                                                            Tạo thẻ tự động
                                                        </button>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="display">Hiển thị bên ngoài</label>
                                                        <select class="form-select digits" id="display" name="display">
                                                            <option value="1" selected>Hiển thị</option>
                                                            <option value="0">Ẩn</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                                    <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal">
                                                        Thoát
                                                    </button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="order-history table-responsive wishlist">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Mã danh mục</th>
                                                <th>Tên danh mục</th>
                                                <th>Slug</th>
                                                <th>Hiển thị</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $category)
                                            <tr>
                                                <td># {{$category->id}}</td>
                                                <td>
                                                    <div class="product-name"><a href="javscript:void(0)">
                                                            <h6>{{$category->category_name}}</h6></a></div>
                                                </td>
                                                <td>{{$category->category_slug}}</td>
                                                <td>
                                                    @if ($category->display == 1)
                                                    <i data-feather="check-circle" style="stroke: green"></i>
                                                        @else
                                                        <i data-feather="x-circle"></i>
                                                        @endif
                                                </td>
                                                <td>
                                                    <a href="{{route("songsIndex"). "?category=$category->id"}} ">
                                                        <i data-feather="align-justify"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                       data-bs-target="#category_modal" data-whatever="@mdo"
                                                       onclick="updateCategory($(this))" data-id="{{$category->id}}"
                                                       data-name="{{$category->category_name}}" data-slug="{{$category->category_slug}}"
                                                       data-display="{{$category->display}}" data-title="{{$category->meta_title}}" data-description = "{{$category->meta_description}}"><i
                                                            data-feather="edit"></i></a>
                                                    <a href="javascript:void(0)" data-id="{{$category->id}}"
                                                       onclick="deleteCategory($(this))">
                                                        <i data-feather="x-circle"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    <style>
                                        .pagination {
                                            padding-top: 20px;
                                            margin-left: -0.5rem !important;
                                            margin-right: -0.5rem !important;
                                            justify-content: center;
                                        }
                                        .page-item.active .page-link{
                                            background-color: #158fea; border-color: #cbd1da00;
                                        }

                                    </style>
                                    {{ $categories->appends(request()->input())->links() }}

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
@include("layouts.jsloading")
<script src="/assets/js/touchspin/vendors.min.js"></script>
<script src="/assets/js/touchspin/touchspin.js"></script>
<script src="/assets/js/touchspin/input-groups.min.js"></script>
<script src="/assets/js/slug.js"></script>
@if(session()->get("message"))
    <script>

        swal({
            icon: 'success',
            title: 'Thành công!',
            text: '{{session()->get("message")}}',

        })


    </script>
@endif
<script>
    function deleteCategory(ele){
        let id = (ele.data("id"));

        swal({
            title: "Thao tác này không thể hoàn tác!",
            text: "Khi bạn xóa danh mục này, các bài hát trong danh mục sẽ bị xóa!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{env("APP_URL"). "/categories/"}}" + id,
                        type: "delete",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            if (response) {
                                swal('Đang xóa danh mục!', '', 'success')
                                location.reload();
                            }
                        },
                    });
                } else {
                    // null
                }

            });
    }


    function createMeta(){
        // Description Random
        let desRandomReq = "{{env("APP_URL")}}" + "/api/random-cate";
        $.ajax(desRandomReq,   // request url
            {
                success: function (data, status, xhr) {// success callback function
                    let meta_des = data.description;
                    let currentTitle = $("#category_name").val();
                    let meta_des_text = meta_des.replace("$", currentTitle);
                    $("#category_meta_description").val(meta_des_text)
                }
            });
        let urlReq = "{{env("APP_URL")}}" + "/api/random-song";
        $.ajax(urlReq,   // request url
            {
                success: function (data, status, xhr) {// success callback function
                    let meta_title = data.title;
                    let currentTitle = $("#category_name").val();
                    let meta_title_text = meta_title.replace(/[$]/g, currentTitle);
                    $("#category_meta_title").val(meta_title_text)
                }
            });
    }
    function createSlug(){
        let title = $("#category_name").val();
        $("#category_slug").val((slug(title)));
    }

    function updateCategory(ele) {

        $("#category_name").val(ele.data("name"));
        $("#category_slug").val(ele.data("slug"));
        $("#display").val(ele.data("display"));
        $("#category_meta_title").val(ele.data("title"));
        $("#category_meta_description").val(ele.data("description"));
        $("#category").attr("method", "post");
        $("#category").attr("action", '{{env("APP_URL")}}'+'/categories/' + ele.data('id'));
    }


    function searching(val){
        let url = "{{env("APP_URL")}}" +  "/categories?search=" + val;
        window.location.href = url;
    }

    $("#searching_input").on("keydown",function search(e) {
        if(e.keyCode == 13) {
            searching($(this).val());
        }
    });


</script>



</body>
</html>
