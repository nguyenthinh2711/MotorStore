@extends('layout')

@section('content')
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Danh sách sản phẩm<span>Motor Store</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('listproduct').'/1' }}">Sản phẩm</a></li>
            @foreach ($cate_selected as $cate_selected)
                <li class="breadcrumb-item active" aria-current="page">{{$cate_selected->CategoryName}}</li>
            @endforeach
            
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="toolbox">
                    <div class="toolbox-left">
                        <div class="toolbox-info">
                        </div><!-- End .toolbox-info -->
                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-right">
                        <form action="" id="form_sort" method="get">
                            <div class="toolbox-sort">
                                <label for="sortby">Sắp xếp theo:</label>
                                <div class="select-custom">
                                    <select name="orderby" id="sortby" class="form-control" onchange="Sort()">
                                        <option {{ Request::get('orderby') == "md" || !Request::get('orderby') ? "selected='selected'" : "" }} value="md" selected>Mặc định</option>
                                        <option {{ Request::get('orderby') == "desc" ? "selected='selected'" : "" }} value="desc">Mới nhất</option>
                                        <option {{ Request::get('orderby') == "asc" ? "selected='selected'" : "" }} value="asc">Sản phẩm cũ</option>
                                        <option {{ Request::get('orderby') == "price_max" ? "selected='selected'" : "" }} value="price_max">Giá tăng dần</option>
                                        <option {{ Request::get('orderby') == "price_min" ? "selected='selected'" : "" }} value="price_min">Giá giảm dần</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->
                        </form>
                    </div><!-- End .toolbox-right -->
                </div><!-- End .toolbox -->

                <div class="products mb-3">
                    <div class="row justify-content-center">   
                        @foreach($products as $product)  
                        <div class="col-6 col-md-4 col-lg-4">
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <a href="{{ route('product_detail').'/'.$product->id }}">
                                        <img src="{{asset('img'.'/'.$product->Picture)}}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="{{ route('addcart', ['id' => $product->id]) }}" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">

                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{ route('product_detail').'/'.$product->id }}">{{ $product->ProductName }}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{ number_format($product->Price).' '.'VND' }}
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{App\Models\Comments::where('ProductId', $product->id)->avg('star')}}%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-lg-4 -->
                        @endforeach
                    </div><!-- End .row -->
                </div><!-- End .products -->

                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{ $products->links() }}
                    </ul>
                </nav>
            </div><!-- End .col-lg-9 -->
            <aside class="col-lg-3 order-lg-first">
                <div class="sidebar sidebar-shop">
                    <div class="widget widget-clean">
                        <label>Lọc sản phẩm:</label>
                        <a href="#" class="sidebar-filter-clear">Xóa tất cả</a>
                    </div><!-- End .widget widget-clean -->

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                Danh mục
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-1">
                            <div class="widget-body">
                                @foreach ($product_count as $product)
                                <div class="filter-items filter-items-count">
                                    <div class="filter-item">
                                        <a href="{{ route('listproduct').'/'.$product->category->id }}" class="product-title"> {{ $product->category->CategoryName }}</a>
                                        <span class="item-count">{{ $product->count }}</span>
                                    </div><!-- End .filter-item -->
                                </div><!-- End .filter-items -->
                                @endforeach
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                Khoảng giá
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-4">
                            <div class="widget-body">
                                <div class="filter-items filter-items-count">
                                    <div class="filter-item">
                                        <a href="{{ request()->fullUrlWithQuery(['price' => 1]) }}" class=" {{ Request::get('price') == 1 ? '' : 'product-title'}}"> Dưới 100.000 đ</a>
                                    </div>
                                </div>
                                <div class="filter-items filter-items-count">
                                    <div class="filter-item">
                                        <a href="{{ request()->fullUrlWithQuery(['price' => 2]) }}" class=" {{ Request::get('price') == 2 ? '' : 'product-title'}}"> 100.000 - 300.000 đ</a>
                                    </div>
                                </div>
                                <div class="filter-items filter-items-count">
                                    <div class="filter-item">
                                        <a href="{{ request()->fullUrlWithQuery(['price' => 3]) }}" class=" {{ Request::get('price') == 3 ? '' : 'product-title'}}"> 300.000 - 500.000 VNĐ</a>
                                    </div>
                                </div>
                                <div class="filter-items filter-items-count">
                                    <div class="filter-item">
                                        <a href="{{ request()->fullUrlWithQuery(['price' => 4]) }}" class=" {{ Request::get('price') == 4 ? '' : 'product-title'}}"> 500.000 - 1.000.000 VNĐ</a>
                                    </div>
                                </div>
                                <div class="filter-items filter-items-count">
                                    <div class="filter-item">
                                        <a href="{{ request()->fullUrlWithQuery(['price' => 5]) }}" class=" {{ Request::get('price') == 5 ? '' : 'product-title'}}"> 1.000.000 - 2.000.000 VNĐ</a>
                                    </div>
                                </div>
                                <div class="filter-items filter-items-count">
                                    <div class="filter-item">
                                        <a href="{{ request()->fullUrlWithQuery(['price' => 6]) }}" class=" {{ Request::get('price') == 6 ? '' : 'product-title'}}"> 2.000.000 - 3.000.000 VNĐ</a>
                                    </div>
                                </div>
                                <div class="filter-items filter-items-count">
                                    <div class="filter-item">
                                        <a href="{{ request()->fullUrlWithQuery(['price' => 7]) }}" class=" {{ Request::get('price') == 7 ? '' : 'product-title'}}"> Trên 3.000.000 VNĐ</a>
                                    </div>
                                </div>
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->
                </div><!-- End .sidebar sidebar-shop -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .page-content -->
<script>
    function Sort(){
        document.getElementById("form_sort").submit();
    }
</script>
@endsection