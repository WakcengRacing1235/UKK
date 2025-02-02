<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kuliah</title>

    <style>
        :root {
            --text-color: #000000;
            --bg-input-color: #4782B2;
            --bg-input-2-color: #70BFFF;
            --bg-1-color: #1A2189;
            --bg-2-color: #FFFFFF;
            --alert-btn-color: #DC060F;
        }

        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
            color: var(--text-color);
        }

        h1 {
            text-align: center;
            /* font-size: 28px; */
            margin-top: 20px;
            color: var(--bg-1-color);
        }

        /* Styling untuk form */
        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        form input,
        form select,
        form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #f9f9f9;
            color: #333;
            transition: border-color 0.3s ease;
        }

        form input:focus,
        form select:focus,
        form textarea:focus {
            border-color: var(--bg-input-color);
            outline: none;
        }

        .flex {
            display: flex;
        }

        form button {
            display: block;
            width: 50%;
            margin: 2px;
            padding: 10px;
            background-color: var(--bg-input-color);
            color: var(--bg-2-color);
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: var(--bg-1-color);
        }

        /* Success Message */
        .success {
            max-width: 600px;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                padding: 15px;
            }

            form input,
            form select,
            form textarea {
                padding: 8px;
            }

            form button {
                font-size: 14px;
            }

            h1 {
                font-size: 24px;
            }
        }

        .form-group-active {
            margin-bottom: 25px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Tambah Data Tracer Kuliah</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('tracerkuliah.store') }}" method="POST">
            @csrf


            <div class="form-group-active">
                <label for="id_alumni">Nama Alumni:</label>
                <select name="id_alumni" id="id_alumni" class="select2-container" required>
                    <option value="">Pilih Alumni</option>
                    @foreach ($alumni as $a)
                        <option value="{{ $a->id_alumni }}">{{ $a->nama_depan }} {{ $a->nama_belakang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="selected_alumni_name">Nama Alumni Terpilih:</label>
                <input type="text" id="selected_alumni_name" class="form-control" readonly>
            </div>



            <div class="form-group">
                <label for="tracer_kuliah_kampus">Nama Kampus:</label>
                <input type="text" name="tracer_kuliah_kampus" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tracer_kuliah_status">Status:</label>
                <input type="text" name="tracer_kuliah_status" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tracer_kuliah_jenjang">Jenjang:</label>
                <input type="text" name="tracer_kuliah_jenjang" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tracer_kuliah_jurusan">Jurusan:</label>
                <input type="text" name="tracer_kuliah_jurusan" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tracer_kuliah_linier">Linier:</label>
                <input type="text" name="tracer_kuliah_linier" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tracer_kuliah_alamat">Alamat Kampus:</label>
                <textarea name="tracer_kuliah_alamat" class="form-control" rows="3" required></textarea>
            </div>

            <div class="flex">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <form action="{{ route('alumni.dashboard') }}" method="GET">
                    <button type="button" class="btn btn-primary"
                        onclick="window.location.href='{{ route('alumni.dashboard') }}'">
                        Kembali
                    </button>
                </form>
            </div>
        </form>
    </div>
</body>
<script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('#id_alumni').select2({
            placeholder: "Cari dan pilih nama alumni...",
            allowClear: true,
            width: '100%' // Pastikan dropdown Select2 menyesuaikan lebar input
        });

        // Tangkap event change
        $('#id_alumni').on('change', function() {
            // Ambil teks dari opsi yang dipilih
            const selectedText = $(this).find('option:selected').text();

            // Update input dengan nama alumni yang dipilih
            $('#selected_alumni_name').val(selectedText);
        });
    });
    @if (session('error-kuliah'))
        Swal.fire({
            title: 'Nama Alumni Tidak Sama',
            // text: '{{ session('success') }}',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    @endif
</script>

</html>
