<button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sắp xếp</button>
<div class="dropdown-menu">
    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'desc', 'page' => null]) }} ">Mới nhất</a>
    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'asc', 'page' => null]) }} ">Cũ nhất</a>
</div>

<button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Trạng thái</button>
<div class="dropdown-menu">
    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['display' => null, 'page' => null]) }} ">Tất cả</a>
    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['display' => '1', 'page' => null]) }} ">Hiển thị</a>
    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['display' => '0', 'page' => null]) }} ">Ẩn</a>
</div>
