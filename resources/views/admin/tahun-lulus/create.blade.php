<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Tambah Sekolah</title>
    <style>
        :root {
            --text-color: #000000;
            --bg-input-color: #4782B2;
            --bg-input-2-color: #70BFFF;
            --bg-1-color: #1A2189;
            --bg-2-color: #FFFFFF;
            --alert-btn-color: #DC060F;
        }

        /* Styling untuk container dan header */
        .container {
            margin: 20px auto;
            max-width: 800px;
            padding: 10px;
        }

        h1 {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            color: var(--bg-1-color);
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        /* Styling untuk form */
        .form {
            max-width: 600px;
            margin: 0 auto;
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

        .form input::placeholder {
            color: #aaa;
            font-style: italic;
        }

        /* Styling tombol */
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
            transition: background-color 0.3s ease;
        }

        .form button:hover {
            background-color: #45a049;
        }

        /* Responsif untuk perangkat kecil */
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Tambah Sekolah</h1>
        <div class="form">
            <form action="{{ route('tahun-lulus.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tahun_lulus">Tahun Lulus</label>
                    <input type="text" name="tahun_lulus" class="form-control" required maxlength="4"
                        placeholder="Masukkan tahun lulus">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" maxlength="50"
                        placeholder="Masukkan keterangan (opsional)">
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
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
