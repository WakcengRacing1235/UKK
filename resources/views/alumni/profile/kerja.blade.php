<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Alumni</title>

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

        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            width: 80%;
            align-self: center;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        div {
            display: flex;
            flex-direction: column;
        }

        div>input,
        div>select {
            margin-top: 5px;
        }
    </style>
</head>
<div class="container">
    <h1>Edit Data Kerja</h1>
    <form action="{{ route('update.kerja', $tracerKerja->id_tracer_kerja) }}" method="POST">
        @csrf
        <div>
            <label for="tracer_kerja_pekerjaan">Pekerjaan</label>
            <input type="text" name="tracer_kerja_pekerjaan"
                value="{{ $tracerKerja->tracer_kerja_pekerjaan ?? '' }}">
        </div>
        <div>
            <label for="tracer_kerja_nama">Nama Perusahaan</label>
            <input type="text" name="tracer_kerja_nama" value="{{ $tracerKerja->tracer_kerja_nama ?? '' }}">
        </div>
        <div>
            <label for="tracer_kerja_jabatan">Jabatan</label>
            <input type="text" name="tracer_kerja_jabatan" value="{{ $tracerKerja->tracer_kerja_jabatan ?? '' }}">
        </div>
        <div>
            <label for="tracer_kerja_status">Status</label>
            <input type="text" name="tracer_kerja_status" value="{{ $tracerKerja->tracer_kerja_status ?? '' }}">
        </div>
        <div>
            <label for="tracer_kerja_lokasi">Lokasi</label>
            <input type="text" name="tracer_kerja_lokasi" value="{{ $tracerKerja->tracer_kerja_lokasi ?? '' }}">
        </div>
        <div>
            <label for="tracer_kerja_alamat">Alamat</label>
            <textarea name="tracer_kerja_alamat" rows="4" style="resize: none;">{{ $tracerKerja->tracer_kerja_alamat ?? '' }}</textarea>
        </div>
        <div> 
            <label for="tracer_kerja_tgl_mulai">Tanggal Mulai Kerja</label>
            <input type="date" name="tracer_kerja_tgl_mulai"
                value="{{ $tracerKerja->tracer_kerja_tgl_mulai ?? '' }}">
        </div>
        <div>
            <label for="tracer_kerja_gaji">Gaji</label>
            <input type="text" name="tracer_kerja_gaji" value="{{ $tracerKerja->tracer_kerja_gaji ?? '' }}">
        </div>

        <!-- Tambahkan input lainnya -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<body>

</body>



</html>
