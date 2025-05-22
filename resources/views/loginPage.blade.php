<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Finance Tracker</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #6b73ff, #000dff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .login-card h3 {
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #333;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #4e54c8;
            border: none;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background-color: #5d63e6;
        }

        .text-center a {
            color: #4e54c8;
            text-decoration: none;
            font-weight: 500;
        }

        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h3>Finance Tracker</h3>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input
                id="email"
                type="email"
                name="email"
                required
                autofocus
                class="form-control @error('email') is-invalid @enderror"
            />
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                required
                class="form-control @error('password') is-invalid @enderror"
            />
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary btn-lg">Log In</button>
        </div>

        <div class="text-center">
            <a href="{{ route('registerPage') }}">Don't have an account? Register</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
