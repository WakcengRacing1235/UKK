<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Sekolah</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/sekolah.css') }}">
</head>
<body>
    <h1>Tambah Sekolah</h1>

    <form action="{{ route('sekolah.store') }}" method="POST" class="form">
        @csrf
        <label for="npsn">NPSN:</label>
        <input type="text" id="npsn" name="npsn" required>

        <label for="nss">NSS:</label>
        <input type="text" id="nss" name="nss" required>

        <label for="nama_sekolah">Nama Sekolah:</label>
        <input type="text" id="nama_sekolah" name="nama_sekolah" required>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required>

        <label for="no_telp">No. Telepon:</label>
        <input type="text" id="no_telp" name="no_telp" required>

        <label for="website">Website:</label>
        <input type="text" id="website" name="website">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <button type="submit" class="btn-submit">Simpan</button>
    </form>
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