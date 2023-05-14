<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
            </div><!-- End .header-left -->

            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="tel:#"><i class="icon-phone"></i>0339563502</a></li>
                            <li><a href="about.html">Giới Thiệu</a></li>
                            <li><a href="{{ route('contact') }}">Liên hệ</a></li>

                            <?php
                                $user_id = Session::get("user_id");
                                if ($user_id != null)
                            {?>
                                <li>{{App\User::find($user_id)->username}}</li>
                                <li><a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        {{ __('Đăng Xuất') }}
                                    </a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            <?php } else { ?>
                                <li><a href="{{ route('get_login_order') }}"><i class="icon-user"></i>Đăng Nhập</a></li>
                            <?php } ?>
                           
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="/" class="logo">
                    <img src="{{asset('assets/images/logo.png')}}" alt="D&H STORE" width="70" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li>
                            <a href="/" class="sf">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" class="sf-with-ul">Sản phẩm</a>
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="{{ route('listproduct').'/'.$category->id }}">{{$category->CategoryName}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('new') }}" class="sf">Tin tức</a>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div class="search-dropdown header-search">
                    <a href="#" class="search-toggle" role="button" title="Tìm kiếm"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Tìm kiếm</label>
                            <input type="search" class="form-control" name="q" id="inputSearch" placeholder="Tìm kiếm..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>

                    <div id="searchResult" class="dropdown-menu dropdown-menu-right" style="display:block; position: absolute;">
                        <div id="searchResultDetail" class="dropdown-cart-products">
                            @foreach($cart as $key)
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="{{ route('product_detail').'/'.$key->id }}">{{ $key->name}}</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            {{number_format($key->price)}} VNĐ
                                        </span>

                                        <span class="cart-product-info">
                                            {{ $key->options->size }}
                                        </span>
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="{{ route('product_detail').'/'.$key->id }}" class="product-image">
                                            <img src="{{ asset('img'.'/'.$key->options->img) }}" alt="product">
                                        </a>
                                    </figure>
                                </div><!-- End .product -->
                            @endforeach
                        </div>

                    </div>
                </div>

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">{{ Cart::count() }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            @foreach($cart as $key)
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="{{ route('product_detail').'/'.$key->id }}">{{ $key->name}}</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty"> {{ $key->qty }}</span>
                                            x {{$key->price}}
                                        </span>

                                        <span class="cart-product-info">
                                            {{ $key->options->size }}
                                        </span>
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="{{ route('product_detail').'/'.$key->id }}" class="product-image">
                                            <img src="{{ asset('img'.'/'.$key->options->img) }}" alt="product">
                                        </a>
                                    </figure>
                                    <form action="{{ route('cart.destroy', $key->rowId) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn-remove" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="icon-close"></i></button>   
                                    </form>
                                </div><!-- End .product -->
                            @endforeach

                        <div class="dropdown-cart-total">
                            <span>Tổng tiền</span>

                            <span class="cart-total-price">{{Cart::subtotal(0,3)}}</span>
                        </div><!-- End .dropdown-cart-total -->

                        <div class="dropdown-cart-action">
                            <a href="{{ route('cart.index') }}" class="btn btn-primary">Giỏ hàng</a>
                            @if(Cart::count() > 0)
                            <?php
                                $user_id = Session::get("user_id");
                                if ($user_id != null) { ?>
                                <a href="{{ route('checkout') }}" class="btn btn-outline-primary-2"><span>Thanh toán</span><i class="icon-long-arrow-right"></i></a>
                            <?php } else { ?>
                                <a href="{{ route('get_login_order') }}" class="btn btn-outline-primary-2"><span>Thanh toán</span><i class="icon-long-arrow-right"></i></a>
                                <?php } ?>
                            @endif
                        </div><!-- End .dropdown-cart-total -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    let inputSearch = document.getElementById("inputSearch");
    let searchResultDOM = document.getElementById("searchResult");
    inputSearch.addEventListener("keyup", (e) => {        
        let keySearch = inputSearch.value.replace(/\s\s+/g, ' ');
        if(keySearch != ""){
            $.ajax({
                    
                // Our sample url to make request
                url:
                        'http://127.0.0.1:8000/api/search-product',

                // Type of Request
                type: "GET",
                data:{
                    txtSearch: keySearch,
                },

                // Function to call when to
                // request is ok
                success: function (data) {
                    let searchResultDetailDOM = document.getElementById("searchResultDetail");
                    let html = "";
                    console.log(data);
                    if(data.length != 0){ 
                        data.forEach(prod => {
                            html += `
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="http://127.0.0.1:8000/product_detail/` + prod.id + `">` + prod.ProductName + `</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            ` + prod.Price  +` VNĐ
                                        </span>
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="http://127.0.0.1:8000/product_detail/ ` + prod.id + `" class="product-image">
                                            <img src="http://127.0.0.1:8000/img/`+ prod.Picture +`" alt="product">
                                        </a>
                                    </figure>
                                </div><!-- End .product -->
                            `;
                        });
                        searchResultDetailDOM.innerHTML = html;
                    }else {
                        searchResultDetailDOM.innerHTML = `<p>Không tìm thấy sản phẩm thích hợp!</p>`;
                    }
                },

                // Error handling
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            })


            searchResultDOM.style.visibility = "visible";
        }else{
            searchResultDOM.style.visibility = "hidden";
        }
    })

</script>
