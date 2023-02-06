<div class="page-main-header">
    <div class="main-header-right row m-0">
        <div class="main-header-left">
            <div class="logo-wrapper"><a href="{{route("dashboard")}}"><img class="img-fluid" src="/assets/images/logo/logo.png" alt=""></a></div>
            <div class="dark-logo-wrapper"><a href="{{route("dashboard")}}"><img class="img-fluid" src="/assets/images/logo/dark-logo.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
        </div>
                <div class="left-menu-header col">
                    <ul>
                        <li>

                                <div class="search-bg form-inline search-form">
                                    <i class="fa fa-search" onclick="searching($('#searching_input').val())"></i>
                                    <input class="form-control-plaintext" id="searching_input" placeholder="Tìm kiếm tại đây ...."
                                    @if(request()->has("search") && (request()->search !== null))
                                        value="{{request()->search}}"
                                        @endif
                                    >
                                </div>

                            <span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
                        </li>
                    </ul>
                </div>
        <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>


                <li class="onhover-dropdown p-0">
                    <button class="btn btn-primary-light" type="button"><a href="{{route("logout")}}"><i data-feather="log-out"></i>Đăng xuất</a></button>
                </li>
            </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
</div>
