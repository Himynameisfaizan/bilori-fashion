@include('partials.header')

<main class="main__content_wrapper">

    <section class="py-5" style="background:#f6f7fb;">
        <div class="container">

            <!-- HEADER -->
            <div class="mb-4">
                <h2 class="fw-bold">My Account</h2>
                <p class="text-muted">Manage your profile and orders</p>
            </div>

            <div class="row g-4">

                <!-- LEFT SIDEBAR -->
                <div class="col-lg-4">

                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">

                            <img src="https://ui-avatars.com/api/?name=User" class="rounded-circle mb-3" width="90">

                            <h5>User Name</h5>
                            <p class="text-muted">user@email.com</p>

                            <hr>

                            <a href="#" class="btn btn-dark w-100 mb-2">
                                My Orders
                            </a>

                            <a href="#" class="btn btn-outline-danger w-100">
                                Logout
                            </a>

                        </div>
                    </div>

                </div>

                <!-- RIGHT CONTENT -->
                <div class="col-lg-8">

                    <!-- ORDERS -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">

                            <h5 class="mb-3">Recent Orders</h5>

                            <div class="text-muted">
                                No orders found.
                            </div>

                        </div>
                    </div>

                    <!-- PROFILE INFO -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">

                            <h5 class="mb-3">Profile Information</h5>

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" value="User Name">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="user@email.com">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="col-md-12">
                                    <button class="btn btn-dark">
                                        Update Profile
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</main>