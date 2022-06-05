@extends('layout')

@section('content')
<div class="container">
    <ul class="nav nav-pills nav-border-anim nav-big justify-content-center mb-3" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="products-new-link" data-toggle="tab" href="#products-new-tab" role="tab" aria-controls="products-new-tab" aria-selected="true">Mới</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="products-sale-link" data-toggle="tab" href="#products-sale-tab" role="tab" aria-controls="products-sale-tab" aria-selected="false">Giảm giá</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" id="products-top-link" data-toggle="tab" href="#products-top-tab" role="tab" aria-controls="products-top-tab" aria-selected="false">top Đánh giá</a>
        </li> --}}
    </ul>
</div><!-- End .container -->
<div class="container-fluid">
    <div class="tab-content tab-content-carousel">
        <div class="tab-pane p-0 fade show active" id="products-new-tab" role="tabpanel" aria-labelledby="products-new-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":5
                        },
                        "1600": {
                            "items":6,
                            "nav": true
                        }
                    }
                }'>
                @foreach ($product_new as $product)
                <div class="product product-11 text-center">
                    <figure class="product-media">
                        <span class="product-label label-circle label-new">Mới</span>
                        <a href="{{ route('product_detail').'/'.$product->id }}">
                            <img src="{{asset('img'.'/'.$product->Picture)}}" alt="Product image" class="product-image">
                            {{-- <img src="assets/images/demos/demo-2/products/product-3-2.jpg" alt="Product image" class="product-image-hover"> --}}
                        </a>
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('product_detail').'/'.$product->id }}">{{$product->ProductName}}</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            {{number_format($product->Price)}} VNĐ
                        </div><!-- End .product-price -->
                    </div><!-- End .product-body -->
                    <div class="product-action">
                        <a href="{{ route('addcart', ['id' => $product->id]) }}" class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></a>
                    </div><!-- End .product-action -->
                </div><!-- End .product -->
                @endforeach     
            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->
        <div class="tab-pane p-0 fade" id="products-sale-tab" role="tabpanel" aria-labelledby="products-sale-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":5
                        },
                        "1600": {
                            "items":6,
                            "nav": true
                        }
                    }
                }'>
                @foreach($products_sale as $product)
                <div class="product product-11 text-center">
                    <figure class="product-media">
                        <span class="product-label label-circle label-sale">-{{ $product->Percent }}%</span>
                        <a href="{{ route('product_detail').'/'.$product->product->id }}">
                            <img src="{{asset('img'.'/'.$product->product->Picture)}}" alt="Product image" class="product-image">
                            {{-- <img src="assets/images/demos/demo-2/products/product-4-2.jpg" alt="Product image" class="product-image-hover"> --}}
                        </a>
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('product_detail').'/'.$product->product->id }}">{{ $product->product->ProductName }}</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <span class="new-price">{{ number_format($product->product->Price * (100 - $product->Percent)/100)  }} VNĐ</span>
                            <span class="old-price">Giá cũ {{ number_format($product->product->Price) }} VNĐ</span>
                        </div><!-- End .product-price -->
                    </div><!-- End .product-body -->
                    <div class="product-action">
                        <a href="{{ route('addcart', ['id' => $product->product->id]) }}" class="btn-product btn-cart"><span>add to cart</span></a>
                    </div><!-- End .product-action -->
                </div><!-- End .product -->
                @endforeach
            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->
    </div><!-- End .tab-content -->
</div><!-- End .container-fluid -->


<div class="container">
    <div class="heading heading-center mb-3">
        <h2 class="title">Top sản phẩm bán chạy</h2><!-- End .title -->

        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true"></a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" id="top-fur-link" data-toggle="tab" href="#top-fur-tab" role="tab" aria-controls="top-fur-tab" aria-selected="false">Furniture</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="top-decor-link" data-toggle="tab" href="#top-decor-tab" role="tab" aria-controls="top-decor-tab" aria-selected="false">Decoration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="top-light-link" data-toggle="tab" href="#top-light-tab" role="tab" aria-controls="top-light-tab" aria-selected="false">Lighting</a>
            </li> --}}
        </ul>
    </div><!-- End .heading -->
    <div class="tab-content">
        <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
            <div class="products">
                <div class="row justify-content-center">
                    @foreach($product_topsell as $product)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <span class="product-label label-circle label-new">Bán chạy</span>
                                <a href="{{ route('product_detail').'/'.$product->id }}">
                                    <img src="{{asset('img'.'/'.$product->Picture)}}" alt="Product image" class="product-image">
                                    {{-- <img src="assets/images/demos/demo-2/products/product-7-2.jpg" alt="Product image" class="product-image-hover"> --}}
                                </a>
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('product_detail').'/'.$product->id }}">{{$product->ProductName}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    {{ number_format($product->Price) }} VNĐ
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="{{ route('addcart', ['id' => $product->id]) }}" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                    @endforeach
                </div><!-- End .row -->
            </div><!-- End .products -->
        </div><!-- .End .tab-pane -->
        <div class="tab-pane p-0 fade" id="top-fur-tab" role="tabpanel" aria-labelledby="top-fur-link">
            <div class="products">
                <div class="row justify-content-center">
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <span class="product-label label-circle label-sale">Sale</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-9-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-9-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Furniture</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Garden Armchair</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">$94,00</span>
                                    <span class="old-price">Was $94,00</span>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <span class="product-label label-circle label-new">New</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-12-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-12-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Furniture</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">2-Seater</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $3.107,00
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                    
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-13-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-13-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Furniture</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Wingback Chair</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $2.486,00
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .products -->
        </div><!-- .End .tab-pane -->
        <div class="tab-pane p-0 fade" id="top-decor-tab" role="tabpanel" aria-labelledby="top-decor-link">
            <div class="products">
                <div class="row justify-content-center">
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-8-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-8-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Decor</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Madra Log Holder</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $401,00
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #927764;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->

                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-11-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-11-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Decor</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Original Outdoor Beanbag</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $259,00
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-14-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-14-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Decor</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Cushion Set 3 Pieces</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $199,00
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-15-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-15-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Decor</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Cushion Set 3 Pieces</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $199,00
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .products -->
        </div><!-- .End .tab-pane -->
        <div class="tab-pane p-0 fade" id="top-light-tab" role="tabpanel" aria-labelledby="top-light-link">
            <div class="products">
                <div class="row justify-content-center">
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-7-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-7-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Lighting</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Petite Table Lamp</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $401,00
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-10-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-10-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Lighting</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Carronade Large Suspension Lamp</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $401,00
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #e8e8e8;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->

                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-2/products/product-16-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-2/products/product-16-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Lighting</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Carronade Table Lamp</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $499,00
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .products -->
        </div><!-- .End .tab-pane -->
    </div><!-- End .tab-content -->
</div><!-- End .container -->
@endsection