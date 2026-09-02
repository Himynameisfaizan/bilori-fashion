<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>Beroli | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

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
</head>

<body>

    @include('partials.header')

    <!-- Login Section -->
    <div style="padding-top:180px;" class="container d-flex justify-content-center align-items-center" style="min-height: 60vh;">

        <div class="card p-4 shadow" style="width: 100%; max-width: 500px;">

            <h3 class="text-center mb-3">Login</h3>

            <!-- Session Status -->
            <x-auth-session-status class="mb-2 text-success" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="newsletter__popup--subscribe__input" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="text-danger" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="newsletter__popup--subscribe__input" required>
                    <x-input-error :messages="$errors->get('password')" class="text-danger" />
                </div>

                <!-- Remember -->
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>

                <!-- Forgot Password -->
                <!-- Forgot Password + Register -->
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">Forgot Password?</a>
    @endif

    <a href="{{ route('register') }}" class="text-primary fw-semibold">
        Create Account
    </a>

</div>

                <!-- Button -->
                <button type="submit" class="newsletter__popup--subscribe__btn w-100">
                    Login
                </button>

            </form>

        </div>

    </div>

    @include('partials.footer')

</body>

</html>