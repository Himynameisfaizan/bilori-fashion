<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>Blogs | Bilori</title>
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
        <section style="padding-top:150px;" class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Blog Grid</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white"
                                        href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Blog Grid</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start blog section -->
        <section class="blog__section section--padding">
            <div class="container">

                <div class="section__heading text-center mb-50">
                    <h2 class="section__heading--maintitle">From The Blog</h2>
                </div>

                <div class="blog__section--inner">

                    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 mb--n30">

                        @foreach($blogs as $blog)

                            <div class="col mb-30">
                                <div class="blog__items">

                                    <!-- IMAGE -->
                                    <div class="blog__thumbnail">
                                        <a class="blog__thumbnail--link" href="{{ url('blog/' . $blog->slug) }}">

                                            <img class="blog__thumbnail--img"
                                                src="{{ $blog->image && file_exists(public_path($blog->image)) ? asset($blog->image) : asset('assets/images/no-image.png') }}"
                                                alt="{{ $blog->title }}">
                                        </a>
                                    </div>

                                    <!-- CONTENT -->
                                    <div class="blog__content">

                                        <span class="blog__content--meta">
                                            {{ $blog->created_at->format('F d, Y') }}
                                        </span>

                                        <h3 class="blog__content--title">
                                            <a href="{{ url('blog/' . $blog->slug) }}">
                                                {{ $blog->title }}
                                            </a>
                                        </h3>

                                        <a class="blog__content--btn primary__btn" href="{{ url('blog/' . $blog->slug) }}">
                                            Read more
                                        </a>

                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>

                    <!-- PAGINATION -->
                    <div class="pagination__area bg__gray--color">
                        <nav class="pagination justify-content-center">

                            {{ $blogs->links() }}

                        </nav>
                    </div>

                </div>

            </div>
        </section>
        <!-- End blog section -->

    </main>
    @include('partials.footer')
</body>

</html>