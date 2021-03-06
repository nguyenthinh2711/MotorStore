@extends('layout')

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('listproduct').'/1' }}">Products</a></li>
            <li class="breadcrumb-item"><a href="{{ route('listproduct').'/'.$product->category->id }}">{{  $product->category->CategoryName }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->ProductName }}</li>
        </ol>

        <nav class="product-pager ml-auto" aria-label="Product">
            <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                <i class="icon-angle-left"></i>
                <span>Prev</span>
            </a>

            <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                <span>Next</span>
                <i class="icon-angle-right"></i>
            </a>
        </nav><!-- End .pager-nav -->
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="product-details-top">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-gallery product-gallery-vertical">
                        <div class="row">
                            <figure class="product-main-image">
                                <img id="product-zoom" src="{{asset('img'.'/'.$product->Picture)}}" data-zoom-image="{{asset('img'.'/'.$product->Picture)}}" alt="product image">
                                {{-- <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                    <i class="icon-arrows"></i>
                                </a> --}}
                            </figure><!-- End .product-main-image -->

                            <div id="product-zoom-gallery" class="product-image-gallery">
                                <div class="product-gallery-item ">
                                    <img  src="{{asset('img'.'/'.$product->Picture)}}"  alt="product side" onclick="changeImg('0')" id="0">
                                </div>
                                
                                {{-- <a class="product-gallery-item active" href="" data-image="{{asset('img'.'/'.$product->Picture)}}" data-zoom-image="{{asset('img'.'/'.$product->Picture)}}">
                                    
                                </a> --}}
                                @foreach($pictures as $value)
                                <div class="product-gallery-item ">
                                    <img  src="{{asset('img'.'/'.$value->picture)}}" alt="product cross" onclick="changeImg('{{$value->id}}')" id="{{ $value->id }}">
                                </div>
                                
                                {{-- <a class="product-gallery-item " href="" data-image="{{asset('img'.'/'.$value->picture)}}" data-zoom-image="{{asset('img'.'/'.$value->picture)}}">
                                    
                                </a> --}}
                                @endforeach
                            </div><!-- End .product-image-gallery -->
                        </div><!-- End .row -->
                    </div><!-- End .product-gallery -->
                </div><!-- End .col-md-6 -->

                <div class="col-md-6">
                    <div class="product-details">
                        <h1 class="product-title">{{ $product->ProductName }}</h1><!-- End .product-title -->

                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: {{App\Models\Comments::where('ProductId', $product->id)->avg('star')}}%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            {{-- <a class="ratings-text"  href="#product-review-link" id="review-link">( 2 ????nh gi?? )</a> --}}
                        </div><!-- End .rating-container -->

                        <div class="product-price">
                            @if (isset($product->Percent)) 
                               <span class="new-price">{{ number_format($product->Price * (100 - $product->Percent)/100)  }} VN??</span>
                                <span class="old-price">{{ number_format($product->Price) }} VN??</span>
                            @else
                                <span class="new-price">{{ number_format($product->Price) }} VN??</span>     
                            @endif 
                        </div><!-- End .product-price -->

                        <div class="product-content">
                            <p>T??m ???????c ph??? t??ng t???t s??? l??m cho chi???c xe m??y c???a b???n tr??? n??n ho??n h???o h??n, cu???c s???ng c???a b???n s??? d??? ch???u h??n.</p>
                        </div><!-- End .product-content -->                     
                        <form action="{{ route('addcart', ['id' => $product->id]) }}" method="get" enctype="multipart/form-data">
                            @csrf
                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="number" id="qty" name="txtQty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                </div><!-- End .product-details-quantity -->
                            </div><!-- End .details-filter-row -->

                            <div class="product-details-action">
                                <button type="submit" class="btn-product btn-cart"><span>TH??M GI??? H??NG</span></button>
                                {{-- <a href="{{ route('addcart', ['id' => $product->id]) }}" class="btn-product btn-cart"><span>add to cart</span></a> --}}
                            </div><!-- End .product-details-action -->
                        </form>
                        <div class="product-details-footer">
                            <div class="product-cat">
                                <span>Category:</span>
                                <a href="#">linh ki???n xe m??y</a>,
                                <a href="{{ route('listproduct').'/'.$product->category->id }}">{{ $product->category->CategoryName }}</a>
                            </div><!-- End .product-cat -->

                            <div class="social-icons social-icons-sm">
                                <span class="social-label">Share:</span>
                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                            </div>
                        </div><!-- End .product-details-footer -->
                    </div><!-- End .product-details -->
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div><!-- End .product-details-top -->

        <div class="product-details-tab">
            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">M?? T???</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Giao H??ng & ?????i Tr??? </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">????nh Gi??</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                    <div class="product-desc-content">
                        {!! $product->Description !!}
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                    <div class="product-desc-content">
                        <h3>Giao h??ng v?? ?????i tr???</h3>
                        <p>????? bi???t chi ti???t ?????y ????? v??? c??c t??y ch???n giao h??ng m?? ch??ng t??i cung c???p, vui l??ng xem th??ng tin Giao h??ng c???a ch??ng t??i
                            Ch??ng t??i hy v???ng b???n s??? th??ch m???i l???n mua h??ng, nh??ng n???u b???n c???n tr??? l???i m???t m???t h??ng, b???n c?? th??? l??m nh?? v???y trong v??ng m???t th??ng k??? t??? khi nh???n ???????c. ????? bi???t chi ti???t ?????y ????? v??? c??ch ?????i tr??? h??ng, vui l??ng xem th??ng tin Tr??? h??ng c???a ch??ng t??i</p>
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                    <div class="reviews">
                        @foreach($comments as $comment)
                        <div class="review">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <h4>{{ $comment->name }}</h4>
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{$comment->star}}%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                    </div><!-- End .rating-container -->
                                    <span class="review-date">{{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y') }}</span>
                                </div><!-- End .col -->
                                <div class="col">
                                    <div class="review-content">
                                        <p>{{ $comment->content }}</p>
                                    </div><!-- End .review-content -->
                                </div><!-- End .col-auto -->
                            </div><!-- End .row -->
                        </div><!-- End .review -->
                        @endforeach
                        
                        <div class="review">
                            <div class="row no-gutters">
                                <form action="{{ route('comment',$product->id) }}" id="register" id="contact-form-data" method="post" class="contact-form mb-3">
                                    @csrf
                                    <input type="hidden" name="ProductId" value="{{ $product->id }}">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="name" class="sr-only">T??n</label>
                                            <input type="text" class="form-control" name="name" placeholder="T??n *" id="name" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label for="email" class="sr-only">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email *" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->
                                    <div class="row">
                                        <div class="rating-css col-sm-6">
                                            <div class="star-icon">
                                                <input type="radio" value="20" name="star" checked id="rating1">
                                                <label for="rating1" class="fa fa-star"></label>
                                                <input type="radio" value="40" name="star" id="rating2">
                                                <label for="rating2" class="fa fa-star"></label>
                                                <input type="radio" value="60" name="star" id="rating3">
                                                <label for="rating3" class="fa fa-star"></label>
                                                <input type="radio" value="80" name="star" id="rating4">
                                                <label for="rating4" class="fa fa-star"></label>
                                                <input type="radio" value="100" name="star" id="rating5">
                                                <label for="rating5" class="fa fa-star"></label>
                                            </div>
                                        </div>
                                    </div><!-- End .row -->
                                    <label for="comment" class="sr-only">N???i dung</label>
                                    <textarea class="form-control" name="content"  id="comment" cols="30" rows="4" id="cmessage" required placeholder="N???i dung *"></textarea>

                                    <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                        <span>G???i</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form><!-- End .contact-form -->
                            </div><!-- End .row -->
                        </div><!-- End .review -->
                    </div><!-- End .reviews -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .product-details-tab -->
    </div><!-- End .page-content -->
    <script>
        function changeImg(id){
            let imgPath = document.getElementById(id).getAttribute('src');
            console.log(imgPath);
            document.getElementById('product-zoom').setAttribute('src', imgPath);
        }
    </script>
@stop




