<!DOCTYPE html>
<html>
<head>

    <title>Smart Hub Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          rel="stylesheet">

</head>

<body style="background:#f5f7fb;">

<div class="container">

    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5">

            <!-- Login Card -->
            <div class="card border-0 shadow-sm">

                <div class="card-body p-5">


                    <!-- Logo -->
                    <div class="text-center mb-4">

                        <i class="fa-solid fa-cube text-primary"
                           style="font-size:50px;"></i>

                        <h3 class="mt-3">

                            Smart Hub

                        </h3>

                        <p class="text-muted">

                            Management System

                        </p>

                    </div>


                    @if(session('error'))

                        <div class="alert alert-danger">

                            {{ session('error') }}

                        </div>

                    @endif


                    <!-- Form -->
                    <form action="/login"
                          method="POST">

                        @csrf


                        <div class="mb-3">

                            <label>Email</label>

                            <input type="email"
                                   name="email"
                                   class="form-control">

                        </div>


                        <div class="mb-4">

                            <label>Password</label>

                            <input type="password"
                                   name="password"
                                   class="form-control">

                        </div>


                        <button class="btn btn-primary w-100">

                            Login

                        </button>

                    </form>


                    <!-- Demo Account -->
                    <div class="card bg-light border-0 mt-4">

                        <div class="card-body">

                            <h6 class="mb-3">

                                <i class="fa-solid fa-circle-info text-primary"></i>
                                Demo Account

                            </h6>


                            <small>

                                <b>Admin:</b><br>

                                admin@gmail.com<br>

                                Password: 123456

                                <hr>


                                <b>Member:</b><br>

                                member@gmail.com<br>

                                Password: 123456

                            </small>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>