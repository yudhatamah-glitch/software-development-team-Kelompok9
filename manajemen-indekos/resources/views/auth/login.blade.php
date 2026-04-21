<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #224abe);
        }

        .login-card {
            width: 380px;
            border-radius: 15px;
        }

        .login-title {
            font-weight: bold;
            font-size: 22px;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">

    <div class="card login-card shadow p-4">

        <h3 class="text-center login-title mb-3">LOGIN SYSTEM</h3>

        <p class="text-center text-muted mb-4">Silakan masuk ke akun kamu</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>
        </form>

    </div>

</div>

</body>
</html>