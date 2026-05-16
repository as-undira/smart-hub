<!DOCTYPE html>
<html>
<head>

    <title>Member Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          rel="stylesheet">

</head>

<body style="background:#f8fafc;">

<div class="container mt-5">

    <!-- Header -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-4 d-flex justify-content-between align-items-center">

            <div>

                <h3 class="mb-1">

                    Welcome,
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



    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif



    <!-- My Borrowed Items -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-4">

            <h4 class="mb-3">

                <i class="fa-solid fa-box text-primary"></i>
                My Borrowed Items

            </h4>


            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>Equipment</th>
                        <th>Borrow Date</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($myBookings as $booking)

                    <tr>

                        <td>

                            {{ $booking->equipment->name }}

                        </td>


                        <td>

                            {{ $booking->borrow_date }}

                        </td>


                        <td>

                            @if($booking->status == 'approved')

                                <span class="badge bg-success">

                                    Active

                                </span>

                            @else

                                <span class="badge bg-secondary">

                                    Returned

                                </span>

                            @endif

                        </td>


                        <td>

                            @if($booking->status == 'approved')

                                <form action="/return/{{ $booking->id }}"
                                      method="POST">

                                    @csrf

                                    <button class="btn btn-danger btn-sm rounded-3">

                                        Kembalikan

                                    </button>

                                </form>

                            @else

                                <span class="text-muted">

                                    Selesai

                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4"
                            class="text-center text-muted">

                            Belum ada barang yang dipinjam

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>



    <!-- Available Equipment -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <h4 class="mb-4">

                <i class="fa-solid fa-list text-primary"></i>
                Available Equipment

            </h4>


            <div class="row">

                @foreach($equipments as $equipment)

                <div class="col-md-4 mb-4">

                    <div class="card bg-light border-0">

                        <div class="card-body">

                            <h5>

                                {{ $equipment->name }}

                            </h5>


                            <p class="text-muted">

                                {{ $equipment->category }}

                            </p>


                            <span class="badge bg-primary mb-3">

                                {{ $equipment->status }}

                            </span>


                            <form action="/borrow/{{ $equipment->id }}"
                                  method="POST">

                                @csrf

                                <button class="btn btn-primary w-100 rounded-3">

                                    Pinjam Barang

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </div>



    <!-- Logout -->
    <form action="/logout"
          method="POST"
          class="mt-4">

        @csrf

        <button class="btn btn-danger w-100 rounded-3">

            Logout

        </button>

    </form>

</div>

</body>
</html>