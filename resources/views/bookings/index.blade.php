<!DOCTYPE html>
<html>
<head>

    <title>Booking Management</title>

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
                <a href="/" class="text-white text-decoration-none">
                    <i class="fa-solid fa-chart-line me-2"></i>
                    Dashboard
                </a>
            </div>


            <div class="mb-4">
                <a href="/equipments" class="text-white text-decoration-none">
                    <i class="fa-solid fa-box me-2"></i>
                    Equipment
                </a>
            </div>


            <div class="mb-4">
                <a href="/bookings" class="text-white text-decoration-none">
                    <i class="fa-solid fa-calendar-check me-2"></i>
                    Booking
                </a>
            </div>


            <div class="mb-4">
                <a href="/checkins" class="text-white text-decoration-none">
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



        <!-- Content -->
        <div class="col-md-10 p-4">


            <!-- Header -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">

                <div class="card-body p-4">

                    <h3 class="mb-1">

                        Booking Management

                    </h3>

                    <p class="text-muted mb-0">

                        Monitor equipment reservations

                    </p>

                </div>

            </div>



            <!-- Table -->
            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <table class="table align-middle">

                        <thead>

                            <tr>

                                <th>User</th>
                                <th>Equipment</th>
                                <th>Borrow Date</th>
                                <th>Return Date</th>
                                <th>Status</th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($bookings as $booking)

                            <tr>

                                <td>

                                    {{ $booking->user->name }}

                                </td>


                                <td>

                                    {{ $booking->equipment->name }}

                                </td>


                                <td>

                                    {{ $booking->borrow_date }}

                                </td>


                                <td>

                                    {{ $booking->return_date }}

                                </td>


                                <td>

                                    @if($booking->status == 'approved')

                                        <span class="badge bg-success">

                                            Approved

                                        </span>

                                    @elseif($booking->status == 'pending')

                                        <span class="badge bg-warning">

                                            Pending

                                        </span>

                                    @else

                                        <span class="badge bg-secondary">

                                            Returned

                                        </span>

                                    @endif

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>