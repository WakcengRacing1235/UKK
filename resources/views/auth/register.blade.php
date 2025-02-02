<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .register-container {
            background-color: #f2f2f2;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .register-container h2 {
            margin-bottom: 20px;
        }

        .register-container input {
            width: 290px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .register-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .register-container button:hover {
            background-color: #45a049;
        }

        .show-password {
            display: flex;
            align-items: center;
            font-size: 12px;
            margin: -10px 15px 0px 125px;
            margin-top: -10px;
        }

        .show-password label {
            cursor: pointer;
        }

        .register-container .extra-links {
            margin-top: 10px;
            font-size: 12px;
        }

        .register-container .extra-links a {
            color: #0066cc;
            text-decoration: none;
        }

        .register-container .extra-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Full Name" required>
            </div>
            <div>
                <input type="email" name="email" placeholder="Gmail" required>
            </div>
            <div>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <div class="show-password">
                <label>
                    <input type="checkbox" onclick="togglePassword()"> Show Password
                </label>
            </div>
            <button type="submit">Register</button>
        </form>

        <div class="extra-links">
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.querySelector('input[name="password"]');
            const confirmPasswordField = document.querySelector('input[name="password_confirmation"]');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            confirmPasswordField.type = type;
        }
    </script>
</body>
</html>
    