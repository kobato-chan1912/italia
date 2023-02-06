<!DOCTYPE html>
<html lang="en">
@php
    if(isset($post)){
    $titleHead = "Sửa nhạc";
    } else {
    $titleHead = "Thêm nhạc";
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
                            <h3>Quản lý nhạc</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route("songsIndex")}}">Danh sách nhạc</a></li>
                                <li class="breadcrumb-item active">@if(isset($song)) Sửa nhạc @else Thêm nhạc @endif</li>
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
                                <h5>Nhập thông tin nhạc</h5>
                            </div>
                            <form class="form theme-form" method="post" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="title">Tiêu đề nhạc</label>
                                                <input class="form-control" id="title" name="title" placeholder="Nhập tiêu đề nhạc" @if(isset($song)) value="{{$song->title}}" @endif required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="size">Dung lượng nhạc</label>
                                                <input class="form-control" id="size" name="size" placeholder="Nhập dung lượng nhạc" @if(isset($song)) value="{{$song->size}}" @endif required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="slug">Slug của đường dẫn</label>
                                                <input class="form-control" id="slug" name="slug" placeholder="Ấn nút bên dưới để tự động tạo Slug" @if(isset($song)) value="{{$song->slug}}" @endif required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="category">Danh mục</label>
                                                <select class="js-example-basic-single col-sm-12" id="category" name="category" required>
                                                    @php

                                                        $categories = \App\Models\Category::all();
                                                    @endphp
                                                    @foreach($categories as $category)
                                                        {
                                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                        }
                                                    @endforeach


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="music">Upload nhạc</label>
                                                <input class="form-control" type="file" id="music" name="music" placeholder="Upload nhạc" accept="audio/*"
                                                       onchange="@if(isset($song)) $('#hidden_url').val('new') @endif">
                                                <audio id="audio" controls style="padding-top: 30px;">
                                                    <source src="" id="src" />
                                                </audio>


                                                <div class="mb-3" style="padding-top: 20px">
                                                    <button class="btn btn-pill btn-danger" type="button"
                                                            onclick="document.getElementById('src').src=''; document.getElementById('audio').load(); $('#music').val(null);  @if(isset($song)) $('#hidden_url').val('')  @endif  ">
                                                        Xóa nhạc
                                                    </button>
                                                </div>
                                                @if (isset($song))
                                                    <input type="hidden" id="hidden_url" name="hidden_url" value="{{$song->url}}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top: 30px;">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="meta_title">Thẻ Title</label>
                                                <input class="form-control" id="meta_title" name="meta_title" placeholder="Nhập thẻ title" @if(isset($song)) value="{{$song->meta_title}}" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="meta_description">Thẻ Description</label>
                                                <input class="form-control" id="meta_description" name="meta_description" placeholder="Nhập thẻ Description" @if(isset($song)) value="{{$song->meta_description}}" @endif>
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
<script src="/assets/js/select2/select2.full.min.js"></script>
<script src="/assets/js/select2/select2-custom.js"></script>
<script src="/assets/js/slug.js"></script>
<script>
    function createSlug(){
        let title = $("#title").val();
        $("#slug").val((slug(title)));
    }

    // Onload audio //
    function handleFiles(event) {
        var files = event.target.files;
        $("#src").attr("src", URL.createObjectURL(files[0]));
        document.getElementById("audio").load();
        // Generate Size:
        var textSize;
        let size = files[0].size;
        var name = files[0].name.slice(0, -4);
        let totalSizeKB = (size / Math.pow(1024,1)).toFixed(2);
        let totalSizeMB = (size / Math.pow(1024,2)).toFixed(2);
        if (totalSizeKB >= 1000){
            textSize = totalSizeMB + " MB";
        } else {
            textSize = totalSizeKB + " KB";
        }

        // check song name

        $.ajax({
            type:'POST',
            url:"/admin/api/check-song",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                song_name: name
            },
            success:function(data){
                if (data.duplicate == 0){
                    $("#title").val(name);
                    $("#size").val(textSize);
                    createSlug();

                    // Auto Generate Title and Content
                    let urlReq = "{{env("APP_URL")}}" + "/api/random-song";
                    $.ajax(urlReq,   // request url
                        {
                            success: function (data, status, xhr) {// success callback function
                                let meta_title = data.title;
                                let meta_des = data.description;
                                let category_name = $('select[name=category]').find(":selected").text();
                                let fullNameSize = name + " (" + textSize + ")";
                                let meta_title_text = meta_title.replace(/[$]/g, fullNameSize); // change /$/ => to name
                                let meta_des_text = meta_des.replace(/[$]/g, fullNameSize); // change /#/ => to category
                                meta_des_text = meta_des_text.replace(/[#]/g, category_name )
                                $("#meta_title").val(meta_title_text)
                                $("#meta_description").val(meta_des_text)
                            }
                        });
                } else {
                    swal({
                        icon: 'warning',
                        title: 'Trùng bài!',
                        text: 'Bài hát đã tồn tại trên hệ thống',

                    })
                }
            }
        });





    }

    document.getElementById("music").addEventListener("change", handleFiles, false);

    // onchange select audio

    let first_categoryName = "@php echo \App\Models\Category::first()->category_name @endphp"
    // alert(first_categoryName)
    $('#category').data('pre', $(this).find("option:selected").text());

    $('#category').change(function(e){
        var before_change = $(this).data('pre');//get the pre data
        if (before_change === ""){
            before_change = first_categoryName
        }
        // alert(before_change)
        //Do your work here
        $(this).data('pre', $(this).find("option:selected").text());//update the pre data
        let current_data = $(this).data('pre');
        // alert(current_data)

        // find in description
        let des = $("#meta_description").val();
        let new_des = des.replace(new RegExp(before_change, "g"), current_data);
        $("#meta_description").val(new_des)
    })






    @if(isset($song))
    $("#display").val({{$song->display}})
    $("#category").val({{$song->category_id}})
    document.getElementById('src').src = "{{$song->url}}"
    document.getElementById("audio").load();
    @endif



</script>

</body>
</html>
