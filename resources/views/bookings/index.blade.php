<!DOCTYPE html>
<html>
<head>
    <title>Booking Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body style="background:#f8fafc;">

<div class="container-fluid">

    <div class="row">

        @include('layouts.sidebar')

        <div class="col-md-10 p-4">

            <div class="mb-4">
                <h2>Booking Management</h2>
                <p class="text-muted">Manage borrowing schedule</p>
            </div>

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <table class="table align-middle">

                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Equipment</th>
                                <th>Borrow Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>



                        <tbody>

                            @forelse($bookings as $booking)

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
                                    {{ $booking->status }}
                                </td>

                                <td>
                                    <a href="/bookings/{{ $booking->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="/bookings/{{ $booking->id }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="5" class="text-center text-muted">No booking data</td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>