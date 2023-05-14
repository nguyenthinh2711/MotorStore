@extends('layout')

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact us</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->
<div class="container">
    <div class=>
        <iframe class="page-header page-header-big text-center" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.409450378499!2d105.78246109999999!3d21.056302699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab2b3153765f%3A0x31554f8f56f688c6!2zNTc5IFBo4bqhbSBWxINuIMSQ4buTbmcsIEPhu5UgTmh14bq_LCBU4burIExpw6ptLCBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1682418242264!5m2!1svi!2s" width="1168px" height="580px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div><!-- End .page-header -->
</div><!-- End .container -->

<div class="page-content pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-2 mb-lg-0">
                <h2 class="title mb-1">Thông Tin Liên Hệ</h2><!-- End .title mb-2 -->
                <p class="mb-3">Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với bạn sớm nhất có thể.</p>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="contact-info">
                            <h3>Văn phòng</h3>

                            <ul class="contact-list">
                                <li>
                                    <i class="icon-map-marker"></i>
                                    579 Phạm Văn Đồng, Cổ Nhuế, Từ Liêm, Hà Nội, Việt Nam
                                </li>
                                <li>
                                    <i class="icon-phone"></i>
                                    <a href="tel:#">0339563502</a>
                                </li>
                                <li>
                                    <i class="icon-envelope"></i>
                                    <a href="mailto:#">DHstore@gmail.com</a>
                                </li>
                            </ul><!-- End .contact-list -->
                        </div><!-- End .contact-info -->
                    </div><!-- End .col-sm-7 -->

                    <div class="col-sm-5">
                        <div class="contact-info">
                            <h3>Giờ làm việc</h3>

                            <ul class="contact-list">
                                <li>
                                    <i class="icon-clock-o"></i>
                                    <span class="text-dark">Thứ 2-Thứ 7</span> <br>8:00 - 20:00
                                </li>
                                <li>
                                    <i class="icon-calendar"></i>
                                    <span class="text-dark">Chủ nhật</span> <br>8:00 - 17:00
                                </li>
                            </ul><!-- End .contact-list -->
                        </div><!-- End .contact-info -->
                    </div><!-- End .col-sm-5 -->
                </div><!-- End .row -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->

        <hr class="mt-4 mb-5">
    </div><!-- End .container -->
</div><!-- End .page-content -->
@endsection