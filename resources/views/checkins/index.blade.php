<!DOCTYPE html>
<html>
<head>
    <title>Check-in Logs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body style="background:#f8fafc;">

<div class="container-fluid">

    <div class="row">

        @include('layouts.sidebar')

        <div class="col-md-10 p-4">

            <div class="mb-4">
                <h2>Check-in Logs</h2>
                <p class="text-muted">Monitor equipment check-in</p>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Equipment</th>
                                <th>Type</th>
                                <th>Check-in Time</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($checkins as $checkin)

                            <tr>
                                <td>
                                    {{ $checkin->user->name }}
                                </td>

                                <td>
                                    {{ $checkin->equipment->name }}
                                </td>

                                <td>
                                    {{ $checkin->type }}
                                </td>

                                <td>
                                    {{ $checkin->checked_at }}
                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="4"class="text-center text-muted">No check-in activity</td>
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