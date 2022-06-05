<div class="footer-middle">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="widget widget-about">
                    <img src="{{asset('assets/images/logo.png')}}" class="footer-logo" alt="Footer Logo" width="105" height="25">

                    <div class="social-icons">
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .widget about-widget -->
            </div><!-- End .col-sm-6 col-lg-3 -->

            <div class="col-sm-6 col-lg-3">
                <div class="widget">
                    <h4 class="widget-title">Tiện ích</h4><!-- End .widget-title -->

                    <ul class="widget-list">
                        <li><a href="{{ route('new') }}">Tin tức cửa hàng</a></li>
                        <li><a href="about.html">Giới thiệu cửa hàng</a></li>
                        <li><a href="{{ route('contact') }}">Liên hệ với cửa hàng</a></li>
                    </ul><!-- End .widget-list -->
                </div><!-- End .widget -->
            </div><!-- End .col-sm-6 col-lg-3 -->

            <div class="col-sm-6 col-lg-3">
                <div class="widget">
                    <h4 class="widget-title">Danh mục sản phẩm</h4><!-- End .widget-title -->

                    <ul class="widget-list">
                        @foreach($category_footer as $category)
                            <li><a href="{{ route('listproduct').'/'.$category->id }}" style="{{ $category->Status==0?'display:none':'display:block'}} ">{{$category->CategoryName}}</a></li>
                        @endforeach
                    </ul><!-- End .widget-list -->
                </div><!-- End .widget -->
            </div><!-- End .col-sm-6 col-lg-3 -->

            <div class="col-sm-6 col-lg-3">
                <div class="widget">
                    <h4 class="widget-title">Tài khoản</h4><!-- End .widget-title -->

                    <ul class="widget-list">
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
                                <li><a href="{{ route('login') }}">Đăng Nhập</a></li>
                            <?php } ?>
                        <li><a href="cart.html">Giỏ hàng</a></li>
                        <li><a href="#">Lịch sử đặt hàng</a></li>
                        <li><a href="#">Trợ giúp</a></li>
                    </ul><!-- End .widget-list -->
                </div><!-- End .widget -->
            </div><!-- End .col-sm-6 col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .footer-middle -->

<div class="footer-bottom">
    <div class="container">
        <figure class="footer-payments">
            <img src="{{asset('assets/images/payments.png')}}" alt="Payment methods" width="272" height="20">
        </figure><!-- End .footer-payments -->
    </div><!-- End .container -->
</div><!-- End .footer-bottom -->