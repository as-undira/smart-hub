<!DOCTYPE html>
<html>
<head>

    <title>Smart Hub Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          rel="stylesheet">

</head>

<body style="background:#f8fafc;">

<div class="container-fluid">

    <div class="row">


        <!-- Sidebar -->
        <div class="col-md-2 bg-dark text-white min-vh-100 p-4">

            <div class="mb-5">

                <i class="fa-solid fa-cube text-primary fs-3"></i>

                <h4 class="mt-2">

                    Smart Hub

                </h4>

            </div>


            <div class="mb-4">

                <a href="/"
                   class="text-white text-decoration-none">

                    <i class="fa-solid fa-chart-line me-2"></i>
                    Dashboard

                </a>

            </div>


            <div class="mb-4">

                <a href="/equipments"
                   class="text-white text-decoration-none">

                    <i class="fa-solid fa-box me-2"></i>
                    Equipment

                </a>

            </div>


            <div class="mb-4">

                <a href="/bookings"
                   class="text-white text-decoration-none">

                    <i class="fa-solid fa-calendar-check me-2"></i>
                    Booking

                </a>

            </div>


            <div class="mb-4">

                <a href="/checkins"
                   class="text-white text-decoration-none">

                    <i class="fa-solid fa-qrcode me-2"></i>
                    Check-in

                </a>

            </div>



            <div class="mt-5">

                <form action="/logout"
                      method="POST">

                    @csrf

                    <button class="btn btn-danger w-100 rounded-3">

                        Logout

                    </button>

                </form>

            </div>

        </div>



        <!-- Main Content -->
        <div class="col-md-10 p-4">


            <!-- Topbar -->
            <div class="card border-0 shadow-sm mb-4 rounded-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h3 class="mb-1">

                                Welcome back,
                                {{ auth()->user()->name }}

                            </h3>

                            <p class="text-muted mb-0">

                                Role:
                                {{ strtoupper(auth()->user()->role) }}

                            </p>

                        </div>


                        <div>

                            <i class="fa-solid fa-user-circle text-primary"
                               style="font-size:50px;"></i>

                        </div>

                    </div>

                </div>

            </div>



            <!-- Statistics -->
            <div class="row g-4">


                <div class="col-md-3">

                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body p-4">

                            <i class="fa-solid fa-box text-primary fs-2"></i>

                            <p class="text-muted mt-3 mb-1">

                                Total Equipment

                            </p>

                            <h2>

                                {{ $totalEquipment }}

                            </h2>

                        </div>

                    </div>

                </div>



                <div class="col-md-3">

                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body p-4">

                            <i class="fa-solid fa-check text-success fs-2"></i>

                            <p class="text-muted mt-3 mb-1">

                                Available

                            </p>

                            <h2>

                                {{ $availableEquipment }}

                            </h2>

                        </div>

                    </div>

                </div>



                <div class="col-md-3">

                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body p-4">

                            <i class="fa-solid fa-clock text-warning fs-2"></i>

                            <p class="text-muted mt-3 mb-1">

                                Borrowed

                            </p>

                            <h2>

                                {{ $borrowedEquipment }}

                            </h2>

                        </div>

                    </div>

                </div>



                <div class="col-md-3">

                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body p-4">

                            <i class="fa-solid fa-fingerprint text-danger fs-2"></i>

                            <p class="text-muted mt-3 mb-1">

                                Check-ins

                            </p>

                            <h2>

                                {{ $totalCheckin }}

                            </h2>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>

</div>

</body>
</html>