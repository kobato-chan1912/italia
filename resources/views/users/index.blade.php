<!DOCTYPE html>
<html lang="en">
@include("layouts.head", ["title" => env("WEB_NAME"). " - Danh sách người dùng"])
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
                                <h3>Quản lý người dùng</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Home</a></li>
                                    {{--                                    <li class="breadcrumb-item">Pages    </li>--}}
                                    {{--                                    <li class="breadcrumb-item">Ecommerce</li>--}}
                                    <li class="breadcrumb-item active">Danh sách người dùng</li>
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
                                        data-whatever="@mdo" onclick='$("#category").trigger("reset"); $("#category").attr("method", "post"); $("#category").attr("action", ""); $("#password").prop("required", true); $("#password_form > label").html("Mật khẩu:") '>
                                    <i class="fa fa-user" style="padding-right: 4px;"></i>
                                    Thêm người dùng
                                </button>


                                <div class="modal fade" id="category_modal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">Quản lý người dùng</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="" id="category">
                                                @csrf
                                                <div class="modal-body">

                                                    <div class="mb-3">
                                                        <label class="col-form-label"
                                                               for="email">Email:</label>
                                                        <input class="form-control" type="email" id="email" name="email"
                                                               required>
                                                    </div>
                                                    <div class="mb-3" id="password_form">
                                                        <label class="col-form-label"
                                                               for="password">Mật khẩu:</label>
                                                        <input class="form-control" type="password" id="password" name="password" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label"
                                                               for="name">Tên người dùng:</label>
                                                        <input class="form-control" type="name" id="name" name="name" required>
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
                                                <th>ID người dùng</th>
                                                <th>email</th>
                                                <th>Tên người dùng</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td># {{$user->id}}</td>
                                                    <td>
                                                        <div class="product-name"><a href="javscript:void(0)">
                                                                <h6>{{$user->email}}</h6></a></div>
                                                    </td>
                                                    <td>{{$user->name}}</td>

                                                    <td>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-id="{{$user->id}}" data-email="{{$user->email}}" data-name="{{$user->name}}"
                                                           data-bs-target="#category_modal" data-whatever="@mdo"
                                                           onclick="updateCategory($(this))"><i
                                                                data-feather="edit"></i></a>
                                                        @if($user->root!==1)
                                                        <a href="javascript:void(0)" data-id="{{$user->id}}"
                                                           onclick="deleteCategory($(this))">
                                                            <i data-feather="x-circle"></i>
                                                        </a>
                                                            @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>

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
            text: "Người dùng sẽ bị xóa hoàn toàn khỏi hệ thống.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{env("APP_URL"). "/users/"}}" + id,
                        type: "delete",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            if (response) {
                                swal('Đang xóa người dùng!', '', 'success')
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

        $("#email").val(ele.data("email"));
        $("#name").val(ele.data("name"));
        $("#category").attr("method", "post");
        $("#password").val("");
        $("#password").prop('required',false);
        $("#password_form > label").html("Mật khẩu: (Để trống nếu không muốn thay đổi)")
        $("#category").attr("action", '{{env("APP_URL")}}'+'/users/' + ele.data('id'));
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
