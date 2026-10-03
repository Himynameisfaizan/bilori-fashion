<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ $about->meta_title ?? 'About Us | Bilori Fashion' }}</title>
    <meta name="description" content="{{ $about->meta_description ?? 'Learn the story behind Bilori Fashion.' }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <!-- Ultra Premium Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <style>
        :root {
            --bg-pure-white: #ffffff;
            --bg-warm-white: #faf9f8;
            --text-dark: #1a1a1a;
            --text-gray: #555555;
            --accent-gold: #c8815f;
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Montserrat', sans-serif;
        }

        body {
            background-color: var(--bg-pure-white);
            font-family: var(--font-body);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* --- 1. Premium Hero Section with Background Image --- */
        .about-hero {
            position: relative;
            padding: 220px 5% 120px;
            text-align: center;
            background-image: url('{{ !empty($about->image) ? asset($about->image) : "https://images.unsplash.com/photo-1558769132-cb1fac084092?auto=format&fit=crop&w=1920&q=80" }}');
            background-size: cover;
            background-position: center 30%;
            background-attachment: fixed; /* Parallax Effect */
            color: #ffffff;
        }
        .hero-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.4) 100%);
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            animation: fadeInUp 1.2s ease-out forwards;
        }
        
        .about-subtitle-top {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 5px;
            color: var(--accent-gold);
            margin-bottom: 20px;
            display: block;
            font-weight: 600;
        }
        .about-title {
            font-family: var(--font-heading);
            font-size: 64px;
            font-weight: 500;
            line-height: 1.1;
            color: #ffffff;
            margin-bottom: 30px;
            max-width: 900px;
            margin-inline: auto;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }
        .about-desc {
            max-width: 700px;
            margin: 0 auto;
            font-size: 18px;
            line-height: 1.9;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 300;
        }

        /* --- Elegant Breadcrumb (Moved below description) --- */
        .modern-breadcrumb {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: rgba(255, 255, 255, 0.8);
            margin-top: 40px;
            font-weight: 500;
        }
        .modern-breadcrumb a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s;
        }
        .modern-breadcrumb a:hover {
            color: var(--accent-gold);
        }
        .modern-breadcrumb span.separator {
            margin: 0 12px;
            color: rgba(255, 255, 255, 0.5);
        }

        /* --- 2. Editorial Masonry Grid (4 Columns) --- */
        .editorial-gallery {
            padding: 80px 5%;
            background-color: var(--bg-pure-white);
        }
        .masonry-columns {
            column-count: 4; /* Changed from 3 to 4 */
            column-gap: 25px;
        }
        .masonry-item {
            break-inside: avoid;
            margin-bottom: 25px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            position: relative;
        }
        .masonry-item img {
            width: 100%;
            display: block;
            object-fit: cover;
            transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .masonry-item:hover img {
            transform: scale(1.06);
        }

        /* --- 3. Minimal Quote --- */
        .quote-section {
            padding: 100px 20px;
            text-align: center;
            background-color: var(--bg-warm-white);
        }
        .quote-text {
            font-family: var(--font-heading);
            font-size: 36px;
            font-style: italic;
            color: var(--text-dark);
            max-width: 900px;
            margin: 0 auto;
            line-height: 1.5;
            position: relative;
        }
        .quote-text::before {
            content: "“";
            font-size: 80px;
            color: rgba(200, 129, 95, 0.2);
            position: absolute;
            top: -40px;
            left: -40px;
            font-family: var(--font-heading);
        }

        /* --- 4. Vision Split Section --- */
        .vision-split {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            background-color: var(--bg-pure-white);
            padding: 80px 5%;
        }
        .vision-img-col {
            flex: 0 0 50%;
            padding: 20px 5%;
            position: relative;
        }
        .vision-img-col img {
            width: 100%;
            aspect-ratio: 4/5;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
            position: relative;
            z-index: 2;
        }
        .vision-img-col::after {
            content: '';
            position: absolute;
            top: 60px;
            right: 0;
            width: 80%;
            height: 90%;
            background-color: var(--bg-warm-white);
            border: 1px solid #eaeaea;
            z-index: 1;
            border-radius: 12px;
        }
        .vision-text-col {
            flex: 0 0 50%;
            padding: 40px 5%;
        }
        .vision-text-col h2 {
            font-family: var(--font-heading);
            font-size: 46px;
            margin-bottom: 25px;
            color: var(--text-dark);
        }
        .vision-text-col p {
            font-size: 16px;
            line-height: 2.2;
            color: var(--text-gray);
            margin-bottom: 20px;
            font-weight: 300;
        }

        /* --- 5. Craftsmanship Section --- */
        .craftsmanship {
            padding: 100px 5%;
            background-color: var(--bg-warm-white);
            text-align: center;
        }
        .craft-header {
            margin-bottom: 70px;
        }
        .craft-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }
        .craft-item img {
            width: 100%;
            aspect-ratio: 1/1; 
            object-fit: cover;
            object-position: top;
            border-radius: 50%; 
            margin-bottom: 30px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.06);
            transition: transform 0.5s ease;
            max-width: 280px;
            background-color: #eaeaea; /* Fallback color before load */
        }
        .craft-item:hover img {
            transform: translateY(-10px);
        }
        .craft-item h4 {
            font-family: var(--font-heading);
            font-size: 24px;
            margin-bottom: 15px;
            color: var(--text-dark);
        }
        .craft-item p {
            color: var(--text-gray);
            font-size: 15px;
            line-height: 1.8;
            padding: 0 20px;
        }

        /* --- 6. Core Values --- */
        .core-values {
            padding: 100px 5%;
            background-color: var(--bg-pure-white);
            text-align: center;
        }
        .values-title {
            font-size: 14px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--accent-gold);
            margin-bottom: 70px;
            font-weight: 600;
        }
        .values-grid {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 60px;
        }
        .value-box {
            max-width: 260px;
        }
        .value-icon {
            font-size: 38px;
            color: var(--text-dark);
            margin-bottom: 25px;
            transition: transform 0.4s ease, color 0.4s ease;
        }
        .value-box:hover .value-icon {
            transform: scale(1.1);
            color: var(--accent-gold);
        }
        .value-box h5 {
            font-family: var(--font-heading);
            font-size: 22px;
            margin-bottom: 15px;
        }
        .value-box p {
            font-size: 15px;
            color: var(--text-gray);
            line-height: 1.7;
        }

        /* --- Safe Animations --- */
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(40px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .fade-up-element {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .fade-up-element.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* --- Responsive Design --- */
        @media (max-width: 1199px) {
            .masonry-columns { column-count: 3; }
        }
        @media (max-width: 991px) {
            .about-hero { padding: 180px 20px 80px; }
            .about-title { font-size: 48px; }
            .masonry-columns { column-count: 2; }
            .vision-img-col, .vision-text-col { flex: 0 0 100%; padding: 20px; }
            .vision-img-col::after { display: none; }
            .vision-text-col h2 { font-size: 36px; text-align: center; }
            .craft-grid { grid-template-columns: 1fr; gap: 50px; }
            .craft-item img { max-width: 250px; }
            .values-grid { flex-direction: column; align-items: center; }
        }
        @media (max-width: 767px) {
            .about-hero { padding: 150px 20px 60px; background-attachment: scroll; }
            .about-title { font-size: 38px; }
            .quote-text { font-size: 26px; }
            .masonry-columns { column-count: 2; } /* Keeps it 2 columns on mobile for better look */
        }
        /* --- Ultra-Premium Brand Stats Section --- */
        .brand-stats {
            position: relative;
            padding: 120px 5%;
            /* Ek premium dark fabric texture background */
            background-image: url('https://plus.unsplash.com/premium_photo-1664202526559-e21e9c0fb46a?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            background-attachment: fixed; /* Parallax Effect */
        }
        .brand-stats-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(135deg, rgba(20, 20, 20, 0.9) 0%, rgba(40, 30, 25, 0.8) 100%);
            z-index: 1;
        }
        .stats-grid {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            text-align: center;
        }
        .stat-box {
            padding: 40px 20px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px); /* Glassmorphism effect */
            -webkit-backdrop-filter: blur(10px);
            border-radius: 12px;
            transition: transform 0.4s ease, border-color 0.4s ease, box-shadow 0.4s ease;
        }
        .stat-box:hover {
            transform: translateY(-10px);
            border-color: var(--accent-gold);
            background: rgba(255, 255, 255, 0.06);
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }
        .stat-number {
            font-family: var(--font-heading);
            font-size: 60px;
            color: var(--accent-gold);
            margin-bottom: 15px;
            font-weight: 500;
            text-shadow: 0 4px 15px rgba(0,0,0,0.4);
        }
        .stat-title {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            line-height: 1.6;
            margin: 0;
        }
        @media (max-width: 991px) {
            .brand-stats { padding: 80px 5%; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
            .stat-number { font-size: 48px; }
        }
        @media (max-width: 767px) {
            .stats-grid { grid-template-columns: 1fr; gap: 20px; }
            .brand-stats { background-attachment: scroll; /* Disable parallax on mobile for smooth scroll */ }
        }
    </style>
</head>

<body>
    @include('partials.header')

    <main>
        <!-- 1. Hero Section -->
        <section class="about-hero">
            <div class="hero-overlay"></div>
            <div class="container hero-content">
                <span class="about-subtitle-top">{{ $about->subtitle ?? 'Welcome to Bilori' }}</span>
                <h1 class="about-title">{{ $about->title ?? 'About Us' }}</h1>
                <p class="about-desc">
                    {{ $about->short_description }}
                </p>
                <!-- Breadcrumb moved below title and desc -->
                <div class="modern-breadcrumb">
                    <a href="{{ url('/') }}">Home</a>
                    <span class="separator">/</span>
                    <span style="color: var(--accent-gold);">About Us</span>
                </div>
            </div>
        </section>

        <!-- 2. Editorial Masonry Grid (Now 4 Columns) -->
        @if(!empty($about->gallery_images))
        <section class="editorial-gallery fade-up-element">
            <div class="masonry-columns">
                @foreach($about->gallery_images as $img)
                    <div class="masonry-item">
                        <img src="{{ asset($img) }}" alt="Bilori Collection">
                    </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- 3. Minimal Quote -->
        <section class="quote-section fade-up-element">
            <div class="container">
                <p class="quote-text">
                    "But {{ env('APP_NAME', 'Bilori') }} was never just about clothes. It began with a vision: to bring back the art, and bring forward the artisans."
                </p>
            </div>
        </section>

        <!-- 4. Fixed Vision Split Section -->
        <section class="vision-split fade-up-element">
            <div class="vision-img-col">
                @if(!empty($about->vision_images) && isset($about->vision_images[0]))
                    <img src="{{ asset($about->vision_images[0]) }}" alt="Artisan Work">
                @else
                    <img src="https://images.unsplash.com/photo-1583391733959-b001a1db9395?auto=format&fit=crop&w=800&q=80" alt="Bilori Vision">
                @endif
            </div>
            <div class="vision-text-col">
                <h2>{{ $about->vision_title ?? 'Our Heritage & Vision' }}</h2>
                {!! $about->description !!}
            </div>
        </section>

        <!-- 5. Craftsmanship Section (Infinite Loop & Glitch Fixed) -->
        <section class="craftsmanship fade-up-element">
            <div class="container">
                <div class="craft-header">
                    <span class="about-subtitle-top" style="color: var(--accent-gold);">The Process</span>
                    <h2 style="font-family: var(--font-heading); font-size: 42px; color: var(--text-dark);">Art in Every Thread</h2>
                </div>
                <div class="craft-grid">
                    <div class="craft-item">
                        <!-- 'this.onerror=null' stops the infinite reloading loop -->
                        <img src="{{ asset('img/product/big-product1.jpg') }}" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1612423284934-2850a4eaea40?auto=format&fit=crop&w=500&q=80'" alt="Sourcing">
                        <h4>Conscious Sourcing</h4>
                        <p>We handpick the finest fabrics that are gentle on the skin and the environment, ensuring every piece starts with purity.</p>
                    </div>
                    <div class="craft-item">
                        <img src="{{ asset('img/product/big-product2.jpg') }}" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1585860363242-f8319f383e29?auto=format&fit=crop&w=500&q=80'" alt="Crafting">
                        <h4>Handcrafted Details</h4>
                        <p>Our skilled artisans bring decades of heritage to life, weaving magic through intricate embroidery and timeless prints.</p>
                    </div>
                    <div class="craft-item">
                        <img src="{{ asset('img/product/big-product3.jpg') }}" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1550614000-4b95dd24e101?auto=format&fit=crop&w=500&q=80'" alt="Final Product">
                        <h4>Modern Elegance</h4>
                        <p>Traditional roots meet contemporary silhouettes, creating fashion that fits perfectly into the modern woman's wardrobe.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Brand Stats Section (SEO Friendly, No JS Counters) -->
        <!-- Brand Stats Section (Ultra-Premium, SEO Friendly) -->
        <section class="brand-stats fade-up-element">
            <div class="brand-stats-overlay"></div>
            <div class="container">
                <div class="stats-grid">
                    @php
                        // Fallback agar admin ne save nahi kiya hai
                        $stats = !empty($about->brand_stats) ? $about->brand_stats : [
                            ['title' => 'Years of Foundation', 'value' => '50+'],
                            ['title' => 'Skilled Team Members', 'value' => '100+'],
                            ['title' => 'Happy Customers', 'value' => '80K+'],
                            ['title' => 'Monthly Orders', 'value' => '70K+']
                        ];
                    @endphp
                    
                    @foreach($stats as $stat)
                    <div class="stat-box">
                        <h3 class="stat-number">{{ $stat['value'] }}</h3>
                        <p class="stat-title">{{ $stat['title'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- 6. Core Values / Promise Section -->
        <section class="core-values fade-up-element">
            <div class="container">
                <h3 class="values-title">{{ $about->feature_title ?? 'THE BILORI PROMISE' }}</h3>
                
                <div class="values-grid">
                    @if(!empty($about->features_list))
                        @foreach($about->features_list as $feature)
                        <div class="value-box">
                            <div class="value-icon"><i class="{{ $feature['icon'] ?? 'fa-solid fa-gem' }}"></i></div>
                            <h5>{{ $feature['title'] }}</h5>
                            <p>{{ $feature['text'] ?? 'Experience true luxury and comfort in every piece you wear.' }}</p>
                        </div>
                        @endforeach
                    @else
                        <!-- Fallback Premium Content -->
                        <div class="value-box">
                            <div class="value-icon"><i class="fa-solid fa-book-open-reader"></i></div>
                            <h5>You're wearing stories.</h5>
                            <p>Every pattern and thread tells a tale of rich cultural heritage and timeless art.</p>
                        </div>
                        <div class="value-box">
                            <div class="value-icon"><i class="fa-solid fa-hands-holding-circle"></i></div>
                            <h5>You're supporting artisans.</h5>
                            <p>We proudly empower local craftsmen to keep their beautiful traditions alive.</p>
                        </div>
                        <div class="value-box">
                            <div class="value-icon"><i class="fa-solid fa-star"></i></div>
                            <h5>You're keeping the art alive.</h5>
                            <p>By choosing Bilori, you preserve the legacy of handcrafted fashion for the future.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

    </main>

    @include('partials.footer')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const elements = document.querySelectorAll(".fade-up-element");
            
            if (!('IntersectionObserver' in window)) {
                elements.forEach(el => el.classList.add('visible'));
                return;
            }

            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("visible");
                        obs.unobserve(entry.target); 
                    }
                });
            }, {
                root: null,
                threshold: 0, 
                rootMargin: "50px 0px 0px 0px" 
            });

            elements.forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>