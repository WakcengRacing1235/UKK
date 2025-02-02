<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Privasi Alumni</title>
    <link rel="stylesheet" href="{{ asset('css/nav_admin.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {

            height: 800px;
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        /* Styling untuk Form */
        .form {
            max-width: 600px;
            margin: 20px auto;
            background-color: var(--bg-2-color);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-family: Arial, sans-serif;
        }

        /* Styling untuk Judul */
        .form h1 {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: var(--bg--bg-1-color);
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        /* Styling untuk Label */
        .form label {
            font-size: 16px;
            font-weight: bold;
            color: var(--text-color);
            display: block;
            margin-bottom: 8px;
        }

        /* Styling untuk Input */
        .form input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 15px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        /* Fokus pada Input */
        .form input:focus {
            border-color: var(--bg--bg-1-color);
            outline: none;
        }

        /* Styling untuk Tombol */
        .form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: var(--bg-input-color);
            color: var(--bg-2-color);
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form button:hover {
            background-color: var(--alert-btn-color);
            transform: scale(1.05);
        }

        /* Responsivitas */
        @media (max-width: 768px) {
            .form {
                padding: 15px;
            }

            .form h1 {
                font-size: 24px;
            }

            .form button {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>



    <div class="form">
        <h1>Tambah Bidang Keahlian</h1>
        <form action="{{ route('bidang.store') }}" method="POST">
            @csrf
            <div>
                <label for="kode_bidang_keahlian">Kode Bidang Keahlian</label>
                <input type="text" id="kode_bidang_keahlian" name="kode_bidang_keahlian" required>
            </div>
            <div>
                <label for="bidang_keahlian">Nama Bidang Keahlian</label>
                <input type="text" id="bidang_keahlian" name="bidang_keahlian" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
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
