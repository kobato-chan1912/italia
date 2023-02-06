<header class="main-nav">
    <div class="sidebar-user text-center">
        <img class="img-90 rounded-circle" src="/assets/images/dashboard/1.png" alt="">
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">
            <h6 class="mt-3 f-14 f-w-600">{{Auth::user()->name}}</h6></a>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Quản lý chung             </h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route("dashboard")}}"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="/admin/categories"><i data-feather="folder"></i><span>Danh mục</span></a>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="/admin/songs"><i data-feather="music"></i><span>Nhạc</span></a>
                    </li>

                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="book-open"></i><span>Bài viết</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="/admin/posts">Danh sách bài viết</a></li>
                            <li><a href="/admin/post-outside">Bài viết trang chủ</a></li>
                        </ul>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user()->root == 1)
                        <li class="dropdown"><a class="nav-link menu-title link-nav" href="/admin/users"><i data-feather="users"></i><span>Người dùng</span></a>
                        </li>
                    @endif
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="/admin/header"><i data-feather="code"></i><span>Thẻ Head</span></a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Cài đặt ngẫu nhiên             </h6>
                        </div>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="edit-3"></i><span> Danh mục </span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="/admin/random-categories-title">Thẻ Description</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="edit-2"></i><span> Nhạc </span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="/admin/random-songs-title">Thẻ title</a></li>
                            <li><a href="/admin/random-songs-description">Thẻ description</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link menu-title link-nav" href="javascript:void(0)" onclick="function supportAlert() {
                        swal('Liên hệ Zalo để được hỗ trợ', '0356186505', 'info')
                    }
                    supportAlert()"><i data-feather="headphones"></i><span>Hỗ trợ</span></a></li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
