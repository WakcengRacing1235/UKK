<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Alumni</title>

    <style>
        /* CSS untuk halaman edit */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
       
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        h3 {
            font-size: 18px;
            color: #444;
            margin-top: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            font-size: 14px;
            box-sizing: border-box;
        }

        input:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.2);
        }

        form button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            width: 50% 
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .container {
            display: flex;
            flex-direction: column;
        }
        .alamat{
            display: flex;
            flex-direction: column
        }
        .flex-button{
            display: flex;
            gap: 5px;
        }
        .flex-form{
            width: 100%
        }
        div>input,
        div>select {
            margin-top: 5px;
        }
    </style>
</head>



<body>
    <div class="container">
        <h1>Edit Data Alumni</h1>
        <form action="{{ route('update.alumni', $alumni->id_alumni) }}" method="POST">
            @csrf
            <div>
                <label for="nisn">NISN</label>
                <input type="text" name="nisn" value="{{ $alumni->nisn }}" required>
            </div>
            <div>
                <label for="nik">NIK</label>
                <input type="text" name="nik" value="{{ $alumni->nik }}" required>
            </div>
            <div>
                <label for="nama_depan">Nama Depan</label>
                <input type="text" name="nama_depan" value="{{ $alumni->nama_depan }}" required>
            </div>
            <div>
                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" name="nama_belakang" value="{{ $alumni->nama_belakang }}">
            </div>
            <div>
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" required>
                    <option value="Laki-laki" {{ $alumni->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-Laki
                    </option>
                    <option value="Perempuan" {{ $alumni->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
            </div>
            <div>
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" value="{{ $alumni->tgl_lahir }}" required>
            </div>
            <div class="alamat">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" rows="4" style="resize: none;">{{ $alumni->alamat ?? '' }}</textarea>
            </div>
            <div>
                <label for="no_hp">No. HP</label>
                <input type="text" name="no_hp" value="{{ $alumni->no_hp }}" required>
            </div>
            {{-- <div>
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ $alumni->email }}" required>
            </div> --}}

            <!-- Tambahkan input lainnya seperti pada contoh sebelumnya -->
            <main class="flex-button">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <form action="{{ route('alumni.profile.index') }}" method="GET" class="flex-form">
                    <button type="button" class="btn btn-primary"
                        onclick="window.location.href='{{ route('alumni.profile.index') }}'">
                        Kembali
                    </button>
                </form>
            </main>
        </form>
    </div>
</body>


<script>
    @if (session('error-edit-alumni'))
        Swal.fire({
            title: 'NISN, DAN NIK TELAH ADA',
            // text: '{{ session('success') }}',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    @endif
</script>

</html>
