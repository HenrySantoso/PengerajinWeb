<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-hexashop.css') }}">
    <style>
        body {
            height: 100vh;
            background: url('{{ asset('assets/images/kerajinan-perak-kota-ged.png') }}') no-repeat center center fixed;
            background-color: #f7f7f7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }

        .login-card {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-card h2 {
            margin-bottom: 30px;
            text-align: center;
            font-weight: 600;
            color: #2a2a2a;
        }

        .btn-primary {
            background-color: #2a2a2a;
            border-color: #2a2a2a;
        }

        .btn-primary:hover {
            background-color: #3e3e3e;
            border-color: #3e3e3e;
        }

        .hover-link {
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .hover-link:hover {
            color: #000;
            transform: translateY(-1px);
            text-decoration: underline;
        }

        .btn-custom {
            background-color: #4b2e83;
            /* contoh: ungu tua */
            border: none;
            color: white;
        }

        .btn-custom:hover {
            background-color: #3a2468;
        }

        .btn-modern {
            background-color: #16a085;
            /* hijau modern */
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 12px 0;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-modern:hover {
            background-color: #138d75;
            cursor: pointer;
        }

        .link-modern {
            color: #16a085;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .link-modern:hover {
            color: #138d75;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <h2>Login to Admin</h2>
        <form action="loginController.php" method="POST">
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required />
            </div>
            <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required />
            </div>
            <button type="submit"  class="btn-modern w-100">Login</button>
            <div class="text-center mt-4">
                <span class="text-muted">Belum Punya akun?
                    <a href="#" class="link-modern">Daftar</a>
                </span>
            </div>
            <div class="text-center mt-4">
                <span class="text-muted">Lupa Password?
                    <a href="#" class="link-modern">Ubah Password</a>
                </span>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('guest.index') }}" class="d-block text-decoration-none text-secondary hover-link">←
                    Back to Home</a>
            </div>
        </form>
    </div>
</body>

</html>
