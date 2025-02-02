<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Tambah Program Keahlian</title>
    <style>
        /* Root Variables */
        :root {
            --bg-color: #f9f9f9;
            --form-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            --label-color: #333;
            --input-border: #ccc;
            --input-focus: #4CAF50;
            --button-bg: #007BFF;
            --button-hover: #0056b3;
            --text-color: #fff;
        }

        /* Container Styling */
        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: var(--bg-color);
            padding: 20px;
            border-radius: 8px;
            box-shadow: var(--form-shadow);
            font-family: Arial, sans-serif;
        }

        /* Heading Styling */
        .container h1 {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: var(--input-focus);
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        /* Label Styling */
        .container .form-group label {
            font-size: 16px;
            font-weight: bold;
            color: var(--label-color);
            display: block;
            margin-bottom: 8px;
        }

        /* Input Styling */
        .container .form-group input,
        .container .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--input-border);
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
            margin-bottom: 15px;
            transition: border-color 0.3s ease;
        }

        /* Focus Effects */
        .container .form-group input:focus,
        .container .form-group select:focus {
            border-color: var(--input-focus);
            outline: none;
        }

        /* Button Styling */
        .container button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: var(--button-bg);
            color: var(--text-color);
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .container button:hover {
            background-color: var(--button-hover);
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .container h1 {
                font-size: 24px;
            }

            .container button {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Tambah Program Keahlian</h1>
        <form action="{{ route('program.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_program_keahlian">Kode Program</label>
                <input type="text" name="kode_program_keahlian" id="kode_program_keahlian" required>
            </div>
            <div class="form-group">
                <label for="program_keahlian">Nama Program</label>
                <input type="text" name="program_keahlian" id="program_keahlian" required>
            </div>
            <div class="form-group">
                <label for="id_bidang_keahlian">Bidang Keahlian</label>
                <select name="id_bidang_keahlian" id="id_bidang_keahlian" required>
                    <option value="" disabled selected>Pilih Bidang Keahlian</option>
                    @foreach ($bidangKeahlian as $bidang)
                        <option value="{{ $bidang->id_bidang_keahlian }}">{{ $bidang->bidang_keahlian }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Simpan</button>
        </form>
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
