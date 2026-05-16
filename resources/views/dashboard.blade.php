<!DOCTYPE html>
<html>
<head>

    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          rel="stylesheet">

</head>

<body style="background:#f8fafc;">

<div class="container-fluid">

    <div class="row">

        @include('layouts.sidebar')

        <div class="col-md-10 p-4">

            <div class="mb-4">
                <h2>Admin Dashboard</h2>
                <p class="text-muted">Smart Hub Management System</p>
            </div>

            <div class="row">

                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <h6>Total Equipment</h6>
                            <h2>
                                {{ $totalEquipment }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <h6>Available</h6>
                            <h2>
                                {{ $availableEquipment }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <h6>Borrowed</h6>
                            <h2>
                                {{ $borrowedEquipment }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <h6>Damaged</h6>
                            <h2>
                                {{ $damagedEquipment }}
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