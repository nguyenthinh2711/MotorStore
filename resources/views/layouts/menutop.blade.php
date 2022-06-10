<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <div class="header-dropdown">
                    <a href="#">VNĐ</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">Eur</a></li>
                            <li><a href="#">Usd</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropdown -->

                <div class="header-dropdown">
                    <a href="#">VN</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">English</a></li>
                            <li><a href="#">French</a></li>
                            <li><a href="#">Spanish</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropdown -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="tel:#"><i class="icon-phone"></i>+84355979605</a></li>
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
                    <img src="{{asset('assets/images/logo.png')}}" alt="Motor Store" width="70" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li>
                            <a href="/" class="sf">Trang chủ</a>
                        </li>
                        <li>
                            <a href="{{ route('listproduct').'/1' }}" class="sf-with-ul">Sản phẩm</a>
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
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Tìm kiếm"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Tìm kiếm</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Tìm kiếm..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->

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
