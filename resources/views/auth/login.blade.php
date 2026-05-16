<!DOCTYPE html>
<html>
<head>
    <title>Smart Hub Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          rel="stylesheet">
</head>

<body style="background: linear-gradient(
        135deg,
        #0f172a,
        #1e293b
    );
">

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-5">
            <div class="card border-0 shadow rounded-4">
                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <i class="fa-solid fa-cube text-primary"style="font-size:60px;"></i>
                    </div>

                    <div class="text-center mb-4">
                        <h2>Smart Hub</h2>
                        <p class="text-muted">Admin Dashboard Login</p>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>

                    @endif

                    <form action="/login"
                          method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control rounded-3"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label>Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control rounded-3"
                                   required>
                        </div>

                        <button class="btn btn-primary w-100 rounded-3">Login</button>

                    </form>

                    <div class="card bg-light border-0 mt-4">
                        <div class="card-body">
                            <small class="text-muted">
                                <b>Demo Account:</b><br>
                                admin@gmail.com<br>
                                123456
                            </small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>