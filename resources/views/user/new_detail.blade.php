@extends('layout')
@section('content')
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Blog Details<span>Blog</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->

<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $news->title }}</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <article class="entry single-entry entry-fullwidth">
            <div class="row">
                <div class="col-lg-11">
                    <div class="entry-body">
                        <div class="entry-meta">
                            <a href="{{route('new_detail', $news->id)}}">{{ \Carbon\Carbon::parse($news->date)->format('d/m/Y') }}</a>
                        </div><!-- End .entry-meta -->

                        <h2 class="entry-title entry-title-big">
                            {{ $news->title }}
                        </h2><!-- End .entry-title -->


                        <div class="entry-content editor-content">
                            <div class="pb-1"></div><!-- End .pb-1 -->

                            <img src="{{ asset('img'.'/'.$news->picture) }}" alt="image">

                            <div class="pb-1"></div><!-- End .pb-1 -->
                            <div style="font: 16px -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";">
                                {!! $news->content !!}
                            </div>
                            

                        </div><!-- End .entry-content -->

                    </div><!-- End .entry-body -->
                </div><!-- End .col-lg-11 -->

                <div class="col-lg-1 order-lg-first mb-2 mb-lg-0">
                    <div class="sticky-content">
                        <div class="social-icons social-icons-colored social-icons-vertical">
                            <span class="social-label">SHARE:</span>
                            <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                            <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                            <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                        </div><!-- End .soial-icons -->
                    </div><!-- End .sticky-content -->
                </div><!-- End .col-lg-1 -->
            </div><!-- End .row -->
        </article><!-- End .entry -->
        <div class="related-posts">
            <h3 class="title">Related Posts</h3><!-- End .title -->
            
            <div class="owl-carousel owl-simple" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        }
                    }
                }'>
                <article class="entry entry-grid">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="assets/images/blog/grid/3cols/post-1.jpg" alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body">
                        <div class="entry-meta">
                            <a href="#">Nov 22, 2018</a>
                            <span class="meta-separator">|</span>
                            <a href="#">2 Comments</a>
                        </div><!-- End .entry-meta -->

                        <h2 class="entry-title">
                            <a href="single.html">Cras ornare tristique elit.</a>
                        </h2><!-- End .entry-title -->

                        <div class="entry-cats">
                            in <a href="#">Lifestyle</a>,
                            <a href="#">Shopping</a>
                        </div><!-- End .entry-cats -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->

                <article class="entry entry-grid">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="assets/images/blog/grid/3cols/post-2.jpg" alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body">
                        <div class="entry-meta">
                            <a href="#">Nov 21, 2018</a>
                            <span class="meta-separator">|</span>
                            <a href="#">0 Comments</a>
                        </div><!-- End .entry-meta -->

                        <h2 class="entry-title">
                            <a href="single.html">Vivamus ntulla necante.</a>
                        </h2><!-- End .entry-title -->

                        <div class="entry-cats">
                            in <a href="#">Lifestyle</a>
                        </div><!-- End .entry-cats -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->

                <article class="entry entry-grid">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="assets/images/blog/grid/3cols/post-3.jpg" alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body">
                        <div class="entry-meta">
                            <a href="#">Nov 18, 2018</a>
                            <span class="meta-separator">|</span>
                            <a href="#">3 Comments</a>
                        </div><!-- End .entry-meta -->

                        <h2 class="entry-title">
                            <a href="single.html">Utaliquam sollicitudin leo.</a>
                        </h2><!-- End .entry-title -->

                        <div class="entry-cats">
                            in <a href="#">Fashion</a>,
                            <a href="#">Lifestyle</a>
                        </div><!-- End .entry-cats -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->

                <article class="entry entry-grid">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="assets/images/blog/grid/3cols/post-4.jpg" alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body">
                        <div class="entry-meta">
                            <a href="#">Nov 15, 2018</a>
                            <span class="meta-separator">|</span>
                            <a href="#">4 Comments</a>
                        </div><!-- End .entry-meta -->

                        <h2 class="entry-title">
                            <a href="single.html">Fusce pellentesque suscipit.</a>
                        </h2><!-- End .entry-title -->

                        <div class="entry-cats">
                            in <a href="#">Travel</a>
                        </div><!-- End .entry-cats -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->
            </div><!-- End .owl-carousel -->
        </div><!-- End .related-posts -->
    </div><!-- End .container -->
</div><!-- End .page-content -->


@endsection

