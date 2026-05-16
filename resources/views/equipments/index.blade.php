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

        @include('layouts.sidebar')

        <div class="col-md-10 p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2>Equipment Management</h2>
                    <p class="text-muted">Manage equipment inventory</p>
                </div>

                <a href="/equipments/create"class="btn btn-primary rounded-3">+ Add Equipment</a>

            </div>

            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif

            <div class="card border-0 shadow-sm rounded-4 mb-4">

                <div class="card-body">

                    <form method="GET"
                          action="/equipments">

                        <div class="row">

                            <div class="col-md-9">

                                <input type="text"
                                       name="search"
                                       class="form-control rounded-3"
                                       placeholder="Search equipment..."
                                       value="{{ request('search') }}">
                            </div>


                            <div class="col-md-3">
                                <button class="btn btn-primary w-100 rounded-3">Search</button>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <table class="table align-middle">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Condition</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>



                        <tbody>

                            @forelse($equipments as $equipment)

                            <tr>
                                <td>
                                    {{ $equipment->name }}
                                </td>


                                <td>
                                    {{ $equipment->category }}
                                </td>


                                <td>
                                    {{ $equipment->condition }}
                                </td>


                                <td>
                                    {{ $equipment->status }}
                                </td>



                                <td>
                                    <a href="/equipments/{{ $equipment->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="/equipments/{{ $equipment->id }}"
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
                                <td colspan="5"class="text-center text-muted">No equipment data</td>
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