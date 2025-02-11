<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Tambah Data Alumni</title>
    <link rel="stylesheet" href="{{ asset('css/createAlumni.css') }}"> <!-- Tambahkan file CSS -->
</head>

<body>

    <div class="container">
        <h1>Tambah Data Alumni</h1>

        {{-- SweetAlert untuk Error --}}
        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: '{!! implode('<br>', $errors->all()) !!}',
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ session('error') }}',
                });
            </script>
        @endif

        <div class="form">
            <form method="POST" action="{{ route('admin.alumni.store') }}">
                @csrf

                <label for="nisn">NISN</label>
                <input type="text" name="nisn" class="form-control" required>

                <label for="nik">NIK</label>
                <input type="text" name="nik" class="form-control" required>

                <label for="nama_depan">Nama Depan</label>
                <input type="text" name="nama_depan" class="form-control" required>

                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" name="nama_belakang" class="form-control">

                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>

                <label for="id_konsentrasi_keahlian">Konsentrasi Keahlian</label>
                <select name="id_konsentrasi_keahlian" class="form-control" required>
                    @foreach ($konsentrasi as $k)
                        <option value="{{ $k->id_konsentrasi_keahlian }}">{{ $k->konsentrasi_keahlian }}</option>
                    @endforeach
                </select>

                <label for="id_tahun_lulus">Tahun Lulus</label>
                <select name="id_tahun_lulus" class="form-control" required>
                    @foreach ($tahun_lulus as $t)
                        <option value="{{ $t->id_tahun_lulus }}">{{ $t->tahun_lulus }}</option>
                    @endforeach
                </select>

             

                <div class="anjay">
                    <button type="submit">Simpan</button>
                    <button type="button" class="btn btn-primary"
                    onclick="window.location.href='{{ route('admin.alumni.index') }}'">
                    Kembali
                </button>
                </div>
            </form>
        </div>

    </div>

</body>

</html>
