<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sekolah</title>
    <link rel="stylesheet" href="{{ asset('css/sekolah.css') }}">
    <style>
        
    </style>
</head>
<body>
    <h1>Edit Sekolah</h1>

    <form action="{{ route('sekolah.update', $sekolah->id_sekolah) }}" method="POST" class="form">
        @csrf
        @method('PUT')
        <label for="npsn">NPSN:</label>
        <input type="text" id="npsn" name="npsn" value="{{ $sekolah->npsn }}" required>

        <label for="nss">NSS:</label>
        <input type="text" id="nss" name="nss" value="{{ $sekolah->nss }}" required>

        <label for="nama_sekolah">Nama Sekolah:</label>
        <input type="text" id="nama_sekolah" name="nama_sekolah" value="{{ $sekolah->nama_sekolah }}" required>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="{{ $sekolah->alamat }}" required>

        <label for="no_telp">No. Telepon:</label>
        <input type="text" id="no_telp" name="no_telp" value="{{ $sekolah->no_telp }}" required>

        <label for="website">Website:</label>
        <input type="text" id="website" name="website" value="{{ $sekolah->website }}">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $sekolah->email }}">

        <button type="submit" class="btn-submit">Simpan Perubahan</button>
    </form>
</body>
</html>
