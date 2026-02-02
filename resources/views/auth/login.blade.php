<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Nerdtech Labs</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/boxicons.min.css') }}" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #0F0F0F 0%, #1a1a1a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(6, 216, 137, 0.15) 0%, transparent 70%);
            top: -250px;
            right: -250px;
            border-radius: 50%;
        }

        body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(6, 216, 137, 0.1) 0%, transparent 70%);
            bottom: -200px;
            left: -200px;
            border-radius: 50%;
        }

        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 450px;
        }

        .login-card {
            background: rgba(30, 30, 30, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 50px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-section img {
            max-width: 180px;
            margin-bottom: 20px;
            filter: drop-shadow(0 0 20px rgba(6, 216, 137, 0.3));
        }

        .logo-section h1 {
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .logo-section p {
            color: #B5B5B5;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            color: #fff;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: #fff;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #06D889;
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(6, 216, 137, 0.1);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.4);
            font-size: 18px;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #06D889;
        }

        .remember-me label {
            color: #B5B5B5;
            font-size: 14px;
            cursor: pointer;
            margin: 0;
        }

        .forgot-link {
            color: #06D889;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #05c078;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #06D889 0%, #05c078 100%);
            border: none;
            border-radius: 10px;
            color: #0F0F0F;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(6, 216, 137, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .alert {
            padding: 12px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #ff6b6b;
        }

        .alert-success {
            background: rgba(6, 216, 137, 0.1);
            border: 1px solid rgba(6, 216, 137, 0.3);
            color: #06D889;
        }

        .divider {
            text-align: center;
            margin: 30px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
        }

        .divider span {
            background: rgba(30, 30, 30, 0.9);
            padding: 0 15px;
            color: #B5B5B5;
            font-size: 14px;
            position: relative;
            z-index: 1;
        }

        .back-home {
            text-align: center;
            margin-top: 25px;
        }

        .back-home a {
            color: #B5B5B5;
            text-decoration: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: color 0.3s ease;
        }

        .back-home a:hover {
            color: #06D889;
        }

        .back-home i {
            font-size: 18px;
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 40px 30px;
            }

            .logo-section h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="logo-section">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Nerdtech Labs">
                <h1>Admin Portal</h1>
                <p>Sign in to manage your dashboard</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> {{ $errors->first() }}
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-icon">
                        <input 
                            type="email" 
                            class="form-control" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            placeholder="admin@nerdtech.com"
                            required 
                            autofocus
                        >
                        <i class='bx bx-envelope'></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-icon">
                        <input 
                            type="password" 
                            class="form-control" 
                            id="password" 
                            name="password" 
                            placeholder="Enter your password"
                            required
                        >
                        <i class='bx bx-lock-alt'></i>
                    </div>
                </div>

                <div class="remember-forgot">
                    <div class="remember-me">
                        <input type="checkbox" id="remember_me" name="remember">
                        <label for="remember_me">Remember me</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">Forgot Password?</a>
                    @endif
                </div>

                <button type="submit" class="btn-login">
                    Sign In
                </button>
            </form>

            <div class="divider">
                <span>OR</span>
            </div>

            <div class="back-home">
                <a href="{{ route('home') }}">
                    <i class='bx bx-arrow-back'></i>
                    Back to Homepage
                </a>
            </div>
        </div>
    </div>
</body>
</html>
