<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Tambah Data Alumni</title>

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
    </style>
</head>

<body>
    <h1>Tambah Data Alumni</h1>

    {{-- @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}


    <form action="{{ route('alumni.store') }}" method="POST">
        @csrf

        <label for="id_tahun_lulus">Tahun Lulus:</label>
        <select name="id_tahun_lulus" required>
            <option value="">Pilih Tahun Lulus</option>
            @foreach ($tahunLulus as $tahun)
                <option value="{{ $tahun->id_tahun_lulus }}">{{ $tahun->tahun_lulus }}</option>
            @endforeach
        </select>

        <label for="id_konsentrasi_keahlian">Konsentrasi Keahlian:</label>
        <select name="id_konsentrasi_keahlian" required>
            <option value="">Pilih Konsentrasi Keahlian</option>
            @foreach ($konsentrasiKeahlian as $konsentrasi)
                <option value="{{ $konsentrasi->id_konsentrasi_keahlian }}">{{ $konsentrasi->konsentrasi_keahlian }}
                </option>
            @endforeach
        </select>

        <label for="id_status_alumni">Status Alumni:</label>
        <select name="id_status_alumni" required>
            <option value="">Pilih Status Alumni</option>
            @foreach ($statusAlumni as $status)
                <option value="{{ $status->id_status_alumni }}">{{ $status->status }}</option>
            @endforeach
        </select>

        <label for="nisn">NISN:</label>
        <input type="text" name="nisn" required maxlength="20">
k
        <label for="nik">NIK:</label>
        <input type="text" name="nik" required maxlength="20">

        <label for="nama_depan">Nama Depan:</label>
        <input type="text" name="nama_depan" required maxlength="50">

        <label for="nama_belakang">Nama Belakang:</label>
        <input type="text" name="nama_belakang" maxlength="50">

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" name="tempat_lahir" required maxlength="20">

        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" name="tgl_lahir" required>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" maxlength="50" required></textarea>

        <label for="no_hp">No. HP:</label>
        <input type="text" name="no_hp" maxlength="15">

        <label for="akun_fb">Akun Facebook:</label>
        <input type="text" name="akun_fb" maxlength="50">

        <label for="akun_ig">Akun Instagram:</label>
        <input type="text" name="akun_ig" maxlength="50">

        <label for="akun_tiktok">Akun TikTok:</label>
        <input type="text" name="akun_tiktok" maxlength="50">

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ Auth::user()->email }}" required maxlength="50" readonly>


        <label for="password">Password:</label>
        <input type="password" name="password" required minlength="8">

        {{-- <label for="jenis_kelamin">Status Login:</label>
        <select name="status_login" required>
            <option value="">Pilih Status</option>
            <option value="Laki-laki">Aktif</option>
            <option value="Perempuan">Tidak Aktif</option>
        </select> --}}

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

</body>
@if ($errors->any())
    <script>
        Swal.fire({
            title: 'Error!',
            html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if (session('success-store'))
    <script>
        Swal.fire({
            title: 'Sukses!',
            text: '{{ session('success-store') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if (session('warning'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: '{{ session('warning') }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
@endif

 

</html>
{{-- 
try {
Alumni::create($request->all());
return redirect()->route('alumni.Dataalumni.index')->with('success-store', 'Data alumni berhasil ditambahkan!');
} catch (\Illuminate\Database\QueryException $e) {
if ($e->errorInfo[1] == 1062) { // Kode error MySQL untuk duplikasi
return redirect()->route('alumni.tracerstudy.create')->with('duplicate-error', 'Duplikasi terdeteksi pada NISN atau
NIK!');
}
return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
} --}}
