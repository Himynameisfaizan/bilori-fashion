<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ $about->meta_title ?? 'About Us | Bilori Fashion' }}</title>
    <meta name="description" content="{{ $about->meta_description ?? 'Learn more about Bilori Fashion.' }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <!-- Google Fonts for Premium Look -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <style>
        :root {
            --primary-color: #222222;
            --brand-color: #d88975; /* A subtle earthy tone like Kari */
            --bg-light: #fdfdfc;
            --bg-sand: #f8f5f0;
            --text-dark: #333333;
            --text-muted: #666666;
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Montserrat', sans-serif;
        }

        body {
            background-color: var(--bg-light);
            font-family: var(--font-body);
            color: var(--text-dark);
        }

        /* --- Header Section --- */
        .about-hero {
            padding: 160px 0 60px;
            text-align: center;
            background-color: var(--bg-light);
        }
        .about-title {
            font-family: var(--font-heading);
            font-size: 42px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 25px;
            color: var(--primary-color);
        }
        .about-subtitle {
            max-width: 800px;
            margin: 0 auto;
            font-size: 16px;
            line-height: 1.8;
            color: var(--text-dark);
            font-weight: 400;
        }

        /* --- Masonry Grid Section --- */
        .masonry-grid-section {
            padding: 40px 0;
            background-color: var(--bg-light);
        }
        .masonry-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 250px;
            gap: 15px;
        }
        .masonry-item {
            position: relative;
            overflow: hidden;
        }
        .masonry-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }
        .masonry-item:hover img {
            transform: scale(1.05);
        }
        /* Specific Grid Placements to mimic the asymmetric look */
        .item-1 { grid-column: 1 / 2; grid-row: 1 / 3; }
        .item-2 { grid-column: 2 / 3; grid-row: 1 / 4; } /* Tall image */
        .item-3 { grid-column: 3 / 4; grid-row: 1 / 2; }
        .item-4 { grid-column: 4 / 5; grid-row: 1 / 3; }
        .item-5 { grid-column: 1 / 2; grid-row: 3 / 4; }
        .item-6 { grid-column: 3 / 4; grid-row: 2 / 4; }
        .item-7 { grid-column: 4 / 5; grid-row: 3 / 5; }
        
        .story-text-center {
            padding: 80px 20px;
            text-align: center;
            background-color: var(--bg-light);
        }
        .story-text-center p {
            font-family: var(--font-heading);
            font-size: 24px;
            font-style: italic;
            color: var(--text-dark);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* --- Split Content Section (Vision/Artisans) --- */
        .vision-section {
            display: flex;
            flex-wrap: wrap;
            background-color: #d27653; /* Rustic Orange */
            color: white;
        }
        .vision-images {
            flex: 1 1 50%;
            display: flex;
        }
        .vision-images img {
            width: 50%;
            object-fit: cover;
        }
        .vision-content {
            flex: 1 1 50%;
            padding: 80px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .vision-content p {
            font-size: 17px;
            line-height: 2;
            margin-bottom: 20px;
            font-weight: 400;
        }

        /* --- Three Column Images --- */
        .three-col-section {
            padding: 100px 0;
            background-color: var(--bg-sand);
        }
        .three-col-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }
        .three-col-item img {
            width: 100%;
            height: auto;
            border-radius: 4px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .three-col-text {
            text-align: center;
            max-width: 800px;
            margin: 60px auto 0;
            font-size: 16px;
            line-height: 1.8;
            color: var(--text-dark);
        }

        /* --- Features Section --- */
        .features-section {
            padding: 80px 0;
            background-color: var(--bg-light);
            text-align: center;
            border-top: 1px solid #eee;
        }
        .feature-main-title {
            font-size: 16px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 60px;
            font-weight: 600;
        }
        .features-grid {
            display: flex;
            justify-content: center;
            gap: 80px;
            flex-wrap: wrap;
        }
        .feature-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 200px;
        }
        .feature-icon-wrapper {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .feature-icon-wrapper img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }
        .feature-title {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.6;
        }
        .tagline {
            font-family: var(--font-heading);
            font-style: italic;
            font-size: 24px;
            margin-top: 60px;
            color: var(--primary-color);
        }

        /* Responsive Design */
        @media (max-width: 991px) {
            .vision-images, .vision-content { flex: 1 1 100%; }
            .vision-content { padding: 50px 30px; }
            .masonry-grid { grid-template-columns: repeat(2, 1fr); grid-auto-rows: 200px; }
            .item-1, .item-2, .item-3, .item-4, .item-5, .item-6, .item-7 { grid-column: span 1; grid-row: span 1; }
            .three-col-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 767px) {
            .about-hero { padding: 120px 20px 40px; }
            .about-title { font-size: 32px; }
            .features-grid { gap: 40px; }
        }
    </style>
</head>

<body>
    @include('partials.header')

    <main>
        <!-- 1. Hero Title & Intro -->
        <section class="about-hero">
            <div class="container">
                <h1 class="about-title">{{ $about->title }}</h1>
                <p class="about-subtitle">
                    {{ $about->short_description }}
                </p>
            </div>
        </section>

        <!-- 2. Masonry Image Grid (Dynamic based on gallery_images) -->
        @if(!empty($about->gallery_images))
        <section class="masonry-grid-section">
            <div class="container-fluid px-0">
                <div class="masonry-grid">
                    @foreach($about->gallery_images as $index => $img)
                        <!-- Assigning custom classes item-1 to item-7 for the masonry look -->
                        <div class="masonry-item item-{{ ($index % 7) + 1 }}">
                            <img src="{{ asset($img) }}" alt="About Grid Image">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- 3. Short Quote / Story -->
        <section class="story-text-center">
            <div class="container">
                <p>
                    "But {{ env('APP_NAME', 'Bilori') }} was never just about clothes. It began with a vision: to bring back the art, and bring forward the artisans."
                </p>
            </div>
        </section>

        <!-- 4. Vision & Artisan Split Section -->
        <section class="vision-section">
            <div class="vision-images">
                @if(!empty($about->vision_images))
                    @foreach($about->vision_images as $vImg)
                        <img src="{{ asset($vImg) }}" alt="Artisans">
                    @endforeach
                @endif
            </div>
            <div class="vision-content">
                <!-- We use description field here -->
                {!! $about->description !!}
            </div>
        </section>

        <!-- 5. Three Images Row & Bottom Text -->
        <section class="three-col-section">
            <div class="container">
                <div class="three-col-grid">
                    <!-- If you want to allow admin to upload 3 specific images for this, you can add another column to DB, or just use the first 3 images from a new array. For now, assuming static or part of vision_images -->
                    <div class="three-col-item"><img src="{{ asset('img/other/style1.jpg') }}" alt="Style 1"></div>
                    <div class="three-col-item"><img src="{{ asset('img/other/style2.jpg') }}" alt="Style 2"></div>
                    <div class="three-col-item"><img src="{{ asset('img/other/style3.jpg') }}" alt="Style 3"></div>
                </div>
                <div class="three-col-text">
                    {{ $about->vision_description ?? "From easy-breezy co-ords to elegant kurtas, flowing gowns, and vibrant prints — we design with purpose. Styles that feel like home, fit like a dream, and speak of heritage with a modern twist." }}
                </div>
            </div>
        </section>

        <!-- 6. Features / Promise Section -->
        <section class="features-section">
            <div class="container">
                <h3 class="feature-main-title">{{ $about->feature_title ?? 'BECAUSE AT BILORI, YOU’RE NOT JUST WEARING FASHION —' }}</h3>
                
                <div class="features-grid">
                    @if(!empty($about->features_list))
                        @foreach($about->features_list as $feature)
                        <div class="feature-item">
                            <div class="feature-icon-wrapper">
                                <img src="{{ asset($feature['icon'] ?? 'img/icons/default.png') }}" alt="Feature">
                            </div>
                            <div class="feature-title">{{ $feature['title'] }}</div>
                        </div>
                        @endforeach
                    @else
                        <!-- Fallback Default -->
                        <div class="feature-item">
                            <div class="feature-icon-wrapper"><img src="{{ asset('img/icons/icon-spool.png') }}" alt="Icon"></div>
                            <div class="feature-title">You're wearing stories.</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon-wrapper"><img src="{{ asset('img/icons/icon-hands.png') }}" alt="Icon"></div>
                            <div class="feature-title">You're supporting artisans.</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon-wrapper"><img src="{{ asset('img/icons/icon-dress.png') }}" alt="Icon"></div>
                            <div class="feature-title">You're keeping the art alive.</div>
                        </div>
                    @endif
                </div>

                <div class="tagline">LIVE IN BILORI. WEAR THE CHANGE.</div>
            </div>
        </section>

    </main>

    @include('partials.footer')
</body>
</html>