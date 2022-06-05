@extends('layout')

@section('content')
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Blog Listing<span>Blog</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Blog</a></li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                @foreach($news as $new)
                <article class="entry entry-list">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <figure class="entry-media">
                                <a href="{{route('new_detail', $new->id)}}">
                                    <img src="{{asset('img'.'/'.$new->picture)}}" alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->
                        </div><!-- End .col-md-5 -->

                        <div class="col-md-7">
                            <div class="entry-body">
                                <div class="entry-meta">
                                    <a href="#">{{ \Carbon\Carbon::parse($new->date)->format('d/m/Y') }}</a>
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title" >
                                    <a href="{{route('new_detail', $new->id)}}"> {{$new->title}}</a>
                                </h2><!-- End .entry-title -->

                                <div class="entry-content">
                                    <p>{{ $new->description }}</p>
                                    <a href="{{route('new_detail', $new->id)}}" class="read-more">Continue Reading</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </div><!-- End .col-md-7 -->
                    </div><!-- End .row -->
                </article><!-- End .entry -->
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

