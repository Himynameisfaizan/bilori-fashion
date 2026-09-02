<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>Bilori</title>
    <meta name="description" content="Bilori" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{ asset('css/plugins/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/glightbox.min.css') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet" />

    <!-- Plugin css -->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
        
        <script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '840233335473914');
fbq('track', 'PageView');
</script>
</head>

<body>
    @include('partials.header')
    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Blog Details</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white"
                                        href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Blog
                                        Details</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start blog details section -->
        <section class="blog__details--section section--padding">
            <div class="container-fluid">
                <div class="row">
                    {{-- LEFT CONTENT --}}
                    <div class="col-xxl-9 col-xl-8 col-lg-8">
                        <div class="blog__details--wrapper">

                            {{-- BLOG POST --}}
                            <div class="entry__blog">

                                <div class="blog__post--header mb-30">
                                    <h2 class="post__header--title mb-15">
                                        {{ $post->title }}
                                    </h2>

                                    <p class="blog__post--meta">
                                        Posted by : {{ $post->author->name ?? 'Admin' }}
                                        / On : {{ $post->created_at->format('F d, Y') }}
                                        / In :

                                    </p>
                                </div>

                                <div class="blog__thumbnail mb-30">
                                    @if($post->image && file_exists(public_path($post->image)))
                                        <img class="blog__thumbnail--img border-radius-10" src="{{ asset($post->image) }}"
                                            alt="{{ $post->title }}">
                                    @else
                                        <img class="blog__thumbnail--img border-radius-10"
                                            src="{{ asset('assets/images/no-image.png') }}" alt="{{ $post->title }}">
                                    @endif
                                </div>

                                <div class="blog__details--content">
                                    {!! $post->description !!}
                                </div>

                            </div>



                        </div>
                    </div>

                    {{-- RIGHT SIDEBAR --}}


                </div>
            </div>
        </section>
        <!-- End blog details section -->


        <!-- End shipping section -->
    </main>
    @include('partials.footer')
</body>

</html>