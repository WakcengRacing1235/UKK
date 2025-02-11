<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Privasi Alumni</title>
    <link rel="stylesheet" href="{{ asset('css/konsentrasi.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="form">
        <h1>Tambah Konsentrasi Keahlian</h1>

        <form action="{{ route('konsentrasi.store') }}" method="POST">
            @csrf

            <div >
                <label for="id_program_keahlian">Program Keahlian</label>
                <select name="id_program_keahlian" id="id_program_keahlian" required>
                    <option value="" disabled selected>Pilih Program Keahlian</option>
                    @foreach ($programKeahlian as $bidang)
                        <option value="{{ $bidang->id_program_keahlian }}">{{ $bidang->program_keahlian }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="kode_konsentrasi_keahlian">Kode Konsentrasi</label>
                <input type="text" id="kode_konsentrasi_keahlian" name="kode_konsentrasi_keahlian" required>
            </div>

            <div>
                <label for="konsentrasi_keahlian">Nama Konsentrasi</label>
                <input type="text" id="konsentrasi_keahlian" name="konsentrasi_keahlian" required>
            </div> 

            <button type="submit">Simpan</button>
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
