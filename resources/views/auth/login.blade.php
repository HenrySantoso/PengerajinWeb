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
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>
