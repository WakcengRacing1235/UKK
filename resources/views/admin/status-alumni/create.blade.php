<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Status Alumni</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        :root {
            --text-color: #000000;
            --bg-input-color: #4782B2;
            --bg-input-2-color: #70BFFF;
            --bg-1-color: #1A2189;
            --bg-2-color: #FFFFFF;
            --alert-btn-color: #DC060F;
        }

        .form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: var(--bg-2-color);
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form button:hover {
            background-color: #45a049;
        }

        @media (max-width: 768px) {
            .form {
                padding: 15px;
            }

            .form input {
                padding: 8px;
            }

            .form button {
                font-size: 14px;
            }
        }

        h1 {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            color: var(--bg-1-color);
            margin-top: 20px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Status Alumni</h1>
        <div class="form">
            <form action="{{ route('status-alumni.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" id="status" name="status" required>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>


    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
</body>
</html>
