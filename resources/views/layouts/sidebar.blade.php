<div class="col-md-2 bg-dark text-white min-vh-100 p-4">

    <h4 class="mb-5">Smart Hub </h4>

    <div class="mb-4">
        <a href="/"class="text-white text-decoration-none">Dashboard</a>
    </div>

    <div class="mb-4">

        <a href="/equipments" class="text-white text-decoration-none">Equipment</a>

    </div>

    <div class="mb-4">
        <a href="/bookings"class="text-white text-decoration-none"> Booking</a>

    </div>

    <div class="mb-4">
        <a href="/checkins" class="text-white text-decoration-none">Check-in</a>
    </div>

    <form action="/logout"
          method="POST"
          class="mt-5">
        @csrf

        <button class="btn btn-danger w-100">Logout</button>
    </form>

</div>