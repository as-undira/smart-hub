<!DOCTYPE html>
<html>
<head>

    <title>Edit Equipment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          rel="stylesheet">

</head>

<body style="background:#f8fafc;">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-5">

                    <h3 class="mb-4">

                        <i class="fa-solid fa-pen text-warning"></i>
                        Edit Equipment

                    </h3>


                    <form action="{{ route('equipments.update', $equipment->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')


                        <div class="mb-3">

                            <label>Name</label>

                            <input type="text"
                                   name="name"
                                   class="form-control rounded-3"
                                   value="{{ $equipment->name }}">

                        </div>


                        <div class="mb-3">

                            <label>Category</label>

                            <input type="text"
                                   name="category"
                                   class="form-control rounded-3"
                                   value="{{ $equipment->category }}">

                        </div>


                        <div class="mb-3">

                            <label>Condition</label>

                            <select name="condition"
                                    class="form-select rounded-3">

                                <option value="good"
                                {{ $equipment->condition == 'good' ? 'selected' : '' }}>
                                    Good
                                </option>

                                <option value="damaged"
                                {{ $equipment->condition == 'damaged' ? 'selected' : '' }}>
                                    Damaged
                                </option>

                                <option value="maintenance"
                                {{ $equipment->condition == 'maintenance' ? 'selected' : '' }}>
                                    Maintenance
                                </option>

                            </select>

                        </div>


                        <div class="mb-4">

                            <label>Status</label>

                            <select name="status"
                                    class="form-select rounded-3">

                                <option value="available"
                                {{ $equipment->status == 'available' ? 'selected' : '' }}>
                                    Available
                                </option>

                                <option value="borrowed"
                                {{ $equipment->status == 'borrowed' ? 'selected' : '' }}>
                                    Borrowed
                                </option>

                            </select>

                        </div>


                        <button class="btn btn-warning rounded-3">

                            Update

                        </button>


                        <a href="/equipments"
                           class="btn btn-secondary rounded-3">

                            Back

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>