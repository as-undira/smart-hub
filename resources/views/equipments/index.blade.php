<!DOCTYPE html>
<html>
<head>

    <title>Equipment Management</title>

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



        <!-- Main Content -->
        <div class="col-md-10 p-4">


            <!-- Header -->
            <div class="card border-0 shadow-sm mb-4 rounded-4">

                <div class="card-body p-4 d-flex justify-content-between align-items-center">

                    <div>

                        <h3 class="mb-1">

                            Equipment Management

                        </h3>

                        <p class="text-muted mb-0">

                            Manage inventory assets

                        </p>

                    </div>


                    <a href="{{ route('equipments.create') }}"
                       class="btn btn-primary rounded-3">

                        <i class="fa-solid fa-plus"></i>
                        Add Equipment

                    </a>

                </div>

            </div>



            <!-- Table -->
            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <table class="table align-middle">

                        <thead>

                            <tr>

                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Condition</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($equipments as $equipment)

                            <tr>

                                <td>{{ $equipment->id }}</td>

                                <td>{{ $equipment->name }}</td>

                                <td>{{ $equipment->category }}</td>


                                <td>

                                    <span class="badge bg-success">

                                        {{ $equipment->condition }}

                                    </span>

                                </td>


                                <td>

                                    <span class="badge bg-primary">

                                        {{ $equipment->status }}

                                    </span>

                                </td>


                                <td>

                                    <a href="{{ route('equipments.edit', $equipment->id) }}"
                                       class="btn btn-warning btn-sm rounded-3">

                                        Edit

                                    </a>


                                    <form action="{{ route('equipments.destroy', $equipment->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm rounded-3">

                                            Delete

                                        </button>

                                    </form>

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