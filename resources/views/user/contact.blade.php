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
        <iframe class="page-header page-header-big text-center" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.607160049413!2d105.7944547!3d21.0483989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab255a960901%3A0xabaaffb6e444fcd!2zNDFCMSBOZy4gMTA2IMSQLiBIb8OgbmcgUXXhu5FjIFZp4buHdCwgQ-G7lSBOaHXhur8sIFThu6sgTGnDqm0sIEjDoCBO4buZaSAwNA!5e0!3m2!1svi!2s!4v1653895464866!5m2!1svi!2s" width="1168px" height="580px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div><!-- End .page-header -->
</div><!-- End .container -->

<div class="page-content pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-2 mb-lg-0">
                <h2 class="title mb-1">Thông Tin Liên Hệ</h2><!-- End .title mb-2 -->
                <p class="mb-3">Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với bạn sớm nhất có thể.</p>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="contact-info">
                            <h3>Văn phòng</h3>

                            <ul class="contact-list">
                                <li>
                                    <i class="icon-map-marker"></i>
                                    41B1 Ng. 106 Đ. Hoàng Quốc Việt, Cổ Nhuế, Từ Liêm, Hà Nội
                                </li>
                                <li>
                                    <i class="icon-phone"></i>
                                    <a href="tel:#">+84355979605</a>
                                </li>
                                <li>
                                    <i class="icon-envelope"></i>
                                    <a href="mailto:#">thinhnguyen2711@gmail.com</a>
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
            <div class="col-lg-6">
                <h2 class="title mb-1">Có Bất Kì Thắc Mắc?</h2><!-- End .title mb-2 -->
                <p class="mb-2">Hãy gửi ngay thắc mắc của bạn qua mẫu sau</p>

                <form action="#" class="contact-form mb-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="cname" class="sr-only">Tên</label>
                            <input type="text" class="form-control" id="cname" placeholder="Tên *" required>
                        </div><!-- End .col-sm-6 -->

                        <div class="col-sm-6">
                            <label for="cemail" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="cemail" placeholder="Email *" required>
                        </div><!-- End .col-sm-6 -->
                    </div><!-- End .row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <label for="cphone" class="sr-only">Số điện thoại</label>
                            <input type="tel" class="form-control" id="cphone" placeholder="Số điện thoại">
                        </div><!-- End .col-sm-6 -->

                        <div class="col-sm-6">
                            <label for="csubject" class="sr-only">Vấn đề</label>
                            <input type="text" class="form-control" id="csubject" placeholder="Vấn đề">
                        </div><!-- End .col-sm-6 -->
                    </div><!-- End .row -->

                    <label for="cmessage" class="sr-only">Nội dung</label>
                    <textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Nội dung *"></textarea>

                    <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                        <span>Gửi</span>
                        <i class="icon-long-arrow-right"></i>
                    </button>
                </form><!-- End .contact-form -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->

        <hr class="mt-4 mb-5">
    </div><!-- End .container -->
</div><!-- End .page-content -->
@endsection