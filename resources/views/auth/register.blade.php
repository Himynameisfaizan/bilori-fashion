<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>Beroli | Register</title>
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

    <!-- Register Section -->
    <div style="padding-top:180px;" class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card p-4 shadow" style="width: 100%; max-width: 450px;">
            <h3 class="text-center mb-3">Create an Account</h3>

            <!-- Session Status (if any) -->
            @if(session('status'))
                <div class="alert alert-success mb-3">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="newsletter__popup--subscribe__input" required autofocus>
                    <x-input-error :messages="$errors->get('name')" class="text-danger" />
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="newsletter__popup--subscribe__input" required>
                    <x-input-error :messages="$errors->get('email')" class="text-danger" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="newsletter__popup--subscribe__input"
                        required>
                    <x-input-error :messages="$errors->get('password')" class="text-danger" />
                    <small class="text-muted">Password must be at least 8 characters.</small>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="newsletter__popup--subscribe__input" required>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger" />
                </div>

                <!-- Optional: Terms & Conditions Checkbox -->
                <div class="mb-3 form-check">
                    <input type="checkbox" name="terms" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">
                        I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                    </label>
                </div>

                <!-- Register Button -->
                <button type="submit" class="newsletter__popup--subscribe__btn w-100 mb-3">
                    Register
                </button>

                <!-- Link to Login Page -->
                <div class="text-center">
                    <span>Already have an account?</span>
                    <a href="{{ route('login') }}" class="ms-1">Login here</a>
                </div>

            </form>

        </div>
    </div>

    @include('partials.footer')

</body>

</html>