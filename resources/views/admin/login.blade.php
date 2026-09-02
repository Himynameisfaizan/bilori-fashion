<!-- resources/views/admin/login.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary bg-light min-vh-100 d-flex align-items-center">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-header bg-white border-0 pt-5 pb-0">
                        <div class="text-center">
                            <h2 class="fw-bold text-dark mb-2">Welcome Back</h2>
                            <p class="text-secondary-emphasis mb-0">Sign in to your admin account</p>
                        </div>
                    </div>

                    <div class="card-body p-4 p-lg-5">
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show rounded-3 border-0 shadow-sm"
                                role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show rounded-3 border-0 shadow-sm"
                                role="alert">
                                <i class="bi bi-exclamation-circle-fill me-2"></i>
                                <strong>Please fix the following errors:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label fw-semibold text-secondary">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 rounded-start-3">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email" name="email"
                                        class="form-control border-start-0 rounded-end-3 py-2" required autofocus
                                        placeholder="admin@example.com">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold text-secondary">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 rounded-start-3">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password" name="password"
                                        class="form-control border-start-0 rounded-end-3 py-2" required
                                        placeholder="Enter your password">
                                </div>
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label text-secondary" for="remember">
                                    Remember me
                                </label>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit"
                                    class="btn btn-primary btn-lg rounded-3 py-2 fw-semibold shadow-sm">
                                    Sign In
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <a href="#" class="text-decoration-none small text-secondary">Forgot password?</a>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p class="small text-secondary-emphasis opacity-75 mb-0">
                        &copy; {{ date('Y') }} Admin Dashboard. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>