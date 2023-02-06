<!DOCTYPE html>
<html lang="en">
@include("layouts.head", ["title" => env("WEB_NAME"). " - Danh sách nhạc"])
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
                                <h3>Quản lý nhạc</h3>
                                <ol class="breadcrumb">
                                    @if(request()->has("category"))
                                        <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{route("songsIndex")}}">Danh sách nhạc</a></li>
                                        <li class="breadcrumb-item active">Các bài hát thuộc danh mục: @php echo \App\Models\Category::where("id", request()->category)->first()->category_name @endphp </li>
                                    @else
                                    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Home</a></li>
                                    <li class="breadcrumb-item active">Danh sách nhạc</li>
                                        @endif
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

                                <a href="{{route("songsCreate"). "?redirect=".URL::current()}}">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-music" style="padding-right: 4px;"></i>
                                        Thêm nhạc
                                    </button>
                                </a>

                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sắp xếp</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'desc', 'page' => null]) }} ">Mới nhất</a>
                                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'asc', 'page' => null]) }} ">Cũ nhất</a>
                                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'desc|listen', 'page' => null]) }} ">Nghe nhiều nhất</a>
                                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'asc|listen', 'page' => null]) }} ">Nghe ít nhất</a>

                                </div>

                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Trạng thái</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['display' => null, 'page' => null]) }} ">Tất cả</a>
                                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['display' => '1', 'page' => null]) }} ">Hiển thị</a>
                                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['display' => '0', 'page' => null]) }} ">Ẩn</a>
                                </div>

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
                                                        <label class="form-label" for="display">Hiển thị bên ngoài</label>
                                                        <select class="form-select digits" id="display" name="display">
                                                            <option value="1" selected>Hiển thị</option>
                                                            <option value="0">Ẩn</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal">
                                                        Thoát
                                                    </button>
                                                    <button class="btn btn-primary" type="submit">Lưu</button>
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
                                                <th>Mã nhạc</th>
                                                <th>Tiêu đề</th>
                                                <th>Danh mục</th>
                                                <th>Lượt nghe</th>
                                                <th>Lượt tải</th>
                                                <th>Hiển thị</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($songs as $song)
                                                <tr>
                                                    <td># {{$song->id}}</td>
                                                    <td>
                                                        <div class="product-name"><a href="javscript:void(0)">
                                                                <h6>{{$song->title}}</h6></a></div>
                                                    </td>
                                                    <td>{{$song->category->category_name}}</td>
                                                    <td>
                                                        {{$song->listeners}}
                                                    </td>
                                                    <td>
                                                        {{$song->downloads}}
                                                    </td>
                                                    <td>
                                                        @if ($song->display == 1)
                                                            <i data-feather="check-circle" style="stroke: green"></i>
                                                        @else
                                                            <i data-feather="x-circle"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route("songsEdit", $song->id). "?redirect=".URL::full()}}"><i
                                                                data-feather="edit"></i></a>
                                                        <a href="javascript:void(0)" data-id="{{$song->id}}"
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
                                    {{ $songs->appends(request()->input())->links() }}

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
            text: "Khi bạn đồng ý, bài hát sẽ bị xóa vĩnh viễn.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{env("APP_URL"). "/songs/"}}" + id,
                        type: "delete",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            if (response) {
                                swal('Đang xóa bài hát!', '', 'success')
                                location.reload();
                            }
                        },
                    });
                } else {
                    // null
                }

            });
    }

    function searching(val){
        let url = "{{env("APP_URL")}}" +  "/songs?search=" + val;
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
