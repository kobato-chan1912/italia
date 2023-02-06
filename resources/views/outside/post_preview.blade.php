<!DOCTYPE html>
<html lang="en">
@include("layouts.head", ["title" => "random"])
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
                            <h3>Base inputs</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item">Forms</li>
                                <li class="breadcrumb-item">Form Controls</li>
                                <li class="breadcrumb-item active">Base Inputs</li>
                            </ol>
                        </div>
                        <div class="col-sm-6">
                            <!-- Bookmark Start-->
                            <div class="bookmark">
                                <ul>
                                    <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="inbox"></i></a></li>
                                    <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                                    <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                                    <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                                        <form class="form-inline search-form">
                                            <div class="form-group form-control-search">
                                                <input type="text" placeholder="Search..">
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <!-- Bookmark Ends-->
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
                                <h5>Solid input style</h5>
                                <hr>
                            </div>
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div>
                                                @php echo $content @endphp
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" onclick="location.href='{{route('post_outside')}}'">Quay về chỉnh sửa</button>
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
