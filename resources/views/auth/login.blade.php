<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #b3e7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #f2f2f2;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .login-container input {
            width: 290px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .login-container button:hover {
            background-color: #45a049;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 15px 0;
        }

        .social-login img {
            width: 30px;
            cursor: pointer;
        }

        .login-container .extra-links {
            margin-top: 10px;
            font-size: 12px;
        }

        .login-container .extra-links a {
            color: #0066cc;
            text-decoration: none;
        }

        .login-container .extra-links a:hover {
            text-decoration: underline;
        }

        .show-password {
            display: flex;
            align-items: center;
            font-size: 12px;
            margin: -10px 15px 0px 125px;
            margin-top: -10px;
        }

        .kosong {
            width: 400px;
            height: 100%;
        }

        .show-password input {
            margin-left: 5px;
        }
        .login-icons {
        display: flex;
        gap: 10px; /* Jarak antar gambar */
        justify-content: center;
        align-items: center;
    }
    .login-icons img {
        transition: transform 0.2s ease;
    }
    .login-icons img:hover {
        transform: scale(1.1); /* Membesarkan gambar saat di-hover */
    }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <input type="email" name="email" placeholder="Gmail" required>
            </div>
            <div>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="show-password">
                <label class="kosong"></label>
                <label>
                    <input type="checkbox" onclick="togglePassword()"> Show Password
                </label>
            </div>
            <button type="submit">Login</button>
        </form>

        <p>Atau</p>
        <div class="login-icons">
            <a href="">
                <img src="{{ asset('icons/gogle.png') }}" alt="Google Login" style="width: 50px; height: auto;">
            </a>
            <a href="">
                <img src="{{ asset('icons/facebook.png') }}" alt="Facebook Login" style="width: 50px; height: auto;">
            </a>
            <a href="">
                <img src="{{ asset('icons/apple.png') }}" alt="Apple Login" style="width: 50px; height: auto;">
            </a>
        </div>


        <div class="extra-links">
            <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.querySelector('input[name="password"]');
            passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>

</html>