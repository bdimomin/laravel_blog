<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title', $settings->site_title)</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('frontEnd/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontEnd/css/crumina-fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontEnd/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontEnd/css/grid.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontEnd/css/styles.css') }}">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{ asset('frontEnd/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontEnd/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontEnd/css/primary-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontEnd/css/magnific-popup.css') }}">


    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <style>
        .padded-50{
            padding: 40px;
        }
        .text-center{
            text-align: center;
        }
    </style>

</head>


<body class=" ">

<div class="content-wrapper">

@include('frontEnd.includes.header')

    <div class="header-spacer"></div>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Well Done!</strong> {{ Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{ $first_post->featured }}" alt="seo">
                        <div class="overlay"></div>
                        <a href="{{ $first_post->featured }}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{ route('SinglePost',['slug'=>$first_post->slug]) }}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                            <h2 class="post__title entry-title ">
                                <a href="{{ route('SinglePost',['slug'=>$first_post->slug]) }}">{{ $first_post->title }}</a>
                            </h2>

                            <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                               {{ $first_post->created_at->diffForHumans() }}
                                            </time>

                                        </span>

                                <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{ route('AllCategory',['id'=>$first_post->category->id]) }}">{{ $first_post->category->name }}</a>
                                        </span>



                            </div>
                        </div>
                    </div>

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">

            @foreach($second_post as $two_post)
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{ $two_post->featured }}" alt="seo">
                        <div class="overlay"></div>
                        <a href="{{ $two_post->featured }}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{ route('SinglePost',['slug'=>$two_post->slug]) }}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                            <h2 class="post__title entry-title ">
                                <a href="{{ route('SinglePost',['slug'=>$two_post->slug]) }}">{{ $two_post->title }}</a>
                            </h2>

                            <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $two_post->created_at->toFormattedDateString()}}
                                            </time>

                                        </span>

                                <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{ route('AllCategory',['id'=>$two_post->category->id]) }}">{{ $two_post->category->name }}</a>
                                        </span>


                            </div>
                        </div>
                    </div>

                </article>
            </div>
            @endforeach
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                    <div class="offers">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="heading">
                                    <h4 class="h1 heading-title">{{ $python_post->name }}</h4>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="case-item-wrap">
                                @foreach($python_post->posts()->take(3)->get() as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{ $post->featured }}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title"><a href="{{ route('SinglePost',['slug'=>$post->slug]) }}">{{ $post->title }}</a></h6>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="padded-50"></div>
                    <div class="offers">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="heading">
                                    <h4 class="h1 heading-title">{{ $laravel_post->name }}</h4>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="case-item-wrap">
                                @foreach($laravel_post->posts()->take(3)->get() as $lpost)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{ $lpost->featured }}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title"><a href="{{ route('SinglePost',['slug'=>$lpost->slug]) }}">{{ $lpost->title }}</a></h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="padded-50"></div>
                    <div class="offers">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="heading">
                                    @if(isset($wordpress_post))

                                    <h4 class="h1 heading-title">{{ $wordpress_post->name }}</h4>
                                    @endif
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="case-item-wrap">
                                @if(isset($wordpress_post))
                                    @foreach($wordpress_post->posts()->take(3)->get() as $wpost)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{ $wpost->featured }}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title"><a href="{{ route('SinglePost',['slug'=>$wpost->slug]) }}">{{ $wpost->title }}</a></h6>
                                        </div>

                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="padded-50"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Subscribe Form -->

    @include('frontEnd.includes.subscriptionForm')

    <!-- End Subscribe Form -->
</div>



<!-- Footer -->

@include('frontEnd.includes.footer')

<!-- End Footer -->

<svg style="display:none;">
    <symbol id="arrow-left" viewBox="122.9 388.2 184.3 85">
        <path d="M124.1,431.3c0.1,2,1,3.8,2.4,5.2c0,0,0.1,0.1,0.1,0.1l34.1,34.1c1.6,1.6,3.7,2.5,5.9,2.5s4.3-0.9,5.9-2.4
		c1.6-1.6,2.4-3.7,2.4-5.9s-0.9-3.9-2.4-5.5l-19.9-19.5h11.1c1.5,0,2.7-1.5,2.7-3c0-1.5-1.2-3-2.7-3h-17.6c-1.1,0-2.1,0.6-2.5,1.6
		c-0.4,1-0.2,2.1,0.6,2.9l24.4,24.4c0.6,0.6,0.9,1.3,0.9,2.1s-0.3,1.6-0.9,2.1c-0.6,0.6-1.3,0.9-2.1,0.9s-1.6-0.3-2.1-0.9
		l-34.2-34.2c0,0,0,0,0,0c-0.6-0.6-0.8-1.4-0.9-1.9c0,0,0,0,0,0c0-0.2,0-0.4,0-0.6c0.1-0.6,0.3-1.1,0.7-1.6c0-0.1,0.1-0.1,0.2-0.2
		l34.1-34.1c0.6-0.6,1.3-0.9,2.1-0.9s1.6,0.3,2.1,0.9c0.6,0.6,0.9,1.3,0.9,2.1s-0.3,1.6-0.9,2.1l-24.4,24.4c-0.8,0.8-1,2-0.6,3
		c0.4,1,1.4,1.7,2.5,1.7h125.7c1.5,0,2.7-1,2.7-2.5c0-1.5-1.2-2.5-2.7-2.5H152.6l19.9-20.1c1.6-1.6,2.4-3.8,2.4-6s-0.9-4.4-2.4-6
		c-1.6-1.6-3.7-2.5-5.9-2.5s-4.3,0.9-5.9,2.4l-34.1,34.1c-0.2,0.2-0.3,0.3-0.5,0.5c-1.1,1.2-1.8,2.8-2,4.4
		C124.1,430.2,124.1,430.8,124.1,431.3C124.1,431.3,124.1,431.3,124.1,431.3z"></path>
        <path d="M283.3,427.9h14.2c1.7,0,3,1.3,3,3c0,1.7-1.4,3-3,3H175.1c-1.5,0-2.7,1.5-2.7,3c0,1.5,1.2,3,2.7,3h122.4
		c4.6,0,8.4-3.9,8.4-8.5c0-4.6-3.8-8.5-8.4-8.5h-14.2c-1.5,0-2.7,1-2.7,2.5C280.7,426.9,281.8,427.9,283.3,427.9z"></path>
    </symbol>
    <symbol id="arrow-right" viewBox="122.9 388.2 184.3 85">
        <path d="M305.9,430.2c-0.1-2-1-3.8-2.4-5.2c0,0-0.1-0.1-0.1-0.1l-34.1-34.1c-1.6-1.6-3.7-2.5-5.9-2.5c-2.2,0-4.3,0.9-5.9,2.4
		c-1.6,1.6-2.4,3.7-2.4,5.9s0.9,4.1,2.4,5.7l19.9,19.6h-11.1c-1.5,0-2.7,1.5-2.7,3c0,1.5,1.2,3,2.7,3h17.6c1.1,0,2.1-0.7,2.5-1.7
		c0.4-1,0.2-2.2-0.6-2.9l-24.4-24.5c-0.6-0.6-0.9-1.3-0.9-2.1s0.3-1.6,0.9-2.1c0.6-0.6,1.3-0.9,2.1-0.9c0.8,0,1.6,0.3,2.1,0.9
		l34.2,34.2c0,0,0,0,0,0c0.6,0.6,0.8,1.4,0.9,1.9c0,0,0,0,0,0c0,0.2,0,0.4,0,0.6c-0.1,0.6-0.3,1.1-0.7,1.6c0,0.1-0.1,0.1-0.2,0.2
		l-34.1,34.1c-0.6,0.6-1.3,0.9-2.1,0.9s-1.6-0.3-2.1-0.9c-0.6-0.6-0.9-1.3-0.9-2.1s0.3-1.6,0.9-2.1l24.4-24.4c0.8-0.8,1-1.9,0.6-2.9
		c-0.4-1-1.4-1.6-2.5-1.6H158.1c-1.5,0-2.7,1-2.7,2.5c0,1.5,1.2,2.5,2.7,2.5h119.3l-19.9,20c-1.6,1.6-2.4,3.7-2.4,6s0.9,4.4,2.4,5.9
		c1.6,1.6,3.7,2.5,5.9,2.5s4.3-0.9,5.9-2.4l34.1-34.1c0.2-0.2,0.3-0.3,0.5-0.5c1.1-1.2,1.8-2.8,2-4.4
		C305.9,431.3,305.9,430.8,305.9,430.2C305.9,430.2,305.9,430.2,305.9,430.2z"></path>
        <path d="M146.7,433.9h-14.2c-1.7,0-3-1.3-3-3c0-1.7,1.4-3,3-3h122.4c1.5,0,2.7-1.5,2.7-3c0-1.5-1.2-3-2.7-3H132.4
		c-4.6,0-8.4,3.9-8.4,8.5c0,4.6,3.8,8.5,8.4,8.5h14.2c1.5,0,2.7-1,2.7-2.5C149.3,434.9,148.1,433.9,146.7,433.9z"></path>
    </symbol>
    <symbol id="to-top" viewBox="0 0 32 32">
        <path d="M17,22 L25.0005601,22 C27.7616745,22 30,19.7558048 30,17 C30,14.9035809 28.7132907,13.1085075 26.8828633,12.3655101
         L26.8828633,12.3655101 C26.3600217,9.87224935 24.1486546,8 21.5,8 C20.6371017,8 19.8206159,8.19871575 19.0938083,8.55288165
         C17.8911816,6.43144875 15.6127573,5 13,5 C9.13400656,5 6,8.13400656 6,12 C6,12.1381509 6.00400207,12.275367 6.01189661,12.4115388
          L6.01189661,12.4115388 C4.23965876,13.1816085 3,14.9491311 3,17 C3,19.7614237 5.23249418,22 7.99943992,22 L16,22 L16,16 L12.75,19.25
           L12,18.5 L16.5,14 L21,18.5 L20.25,19.25 L17,16 L17,22 L17,22 Z M16,22 L16,27 L17,27 L17,22 L16,22 L16,22 Z" id="cloud-upload"></path>
    </symbol>

</svg>

<!-- Overlay Search -->

@include('frontEnd.includes.searchform')

<!-- End Overlay Search -->

<!-- JS Script -->

<script src="{{ asset('frontEnd/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('frontEnd/js/crum-mega-menu.js') }}"></script>
<script src="{{ asset('frontEnd/js/swiper.jquery.min.js') }}"></script>
<script src="{{ asset('frontEnd/js/theme-plugins.js') }}"></script>
<script src="{{ asset('frontEnd/js/main.js') }}"></script>
<script src="{{ asset('frontEnd/js/form-actions.js') }}"></script>

<script src="{{ asset('frontEnd/js/velocity.min.js') }}"></script>
<script src="{{ asset('frontEnd/js/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('frontEnd/js/animation.velocity.min.js') }}"></script>


<!-- ...end JS Script -->

</body>
</html>