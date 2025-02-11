<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Isi Data Diri Alumni</title>
    <link rel="stylesheet" href="{{ asset('css/indexAlumni.css') }}"> <!-- Hubungkan CSS -->
</head>

<body>

    <div class="container">
        <h2>Cari Data Alumni</h2>

        <!-- Search Form -->
        <form method="GET" action="{{ route('alumni.tracerstudy.search') }}" class="search-form">
            <input type="text" name="search" placeholder="Cari berdasarkan NISN, NIK, dll." class="search-input">
            <button type="submit" class="search-button">Cari</button>
        </form>

        <!-- Tombol Kembali -->
        <a href="{{ route('alumni.dashboard') }}" class="btn btn-danger">Kembali</a>

        @if (isset($alumni) && $alumni->count() > 0)
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>StatusAlumni</th>
                            <th>Alamat</th>

                         
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumni as $a)
                            <tr>
                                <td>{{ $a->nisn ?? '-' }}</td>
                                <td>{{ $a->nik ?? '-' }}</td>
                                <td>{{ $a->nama_depan ?? '-' }} {{ $a->nama_belakang ?? '-' }}</td>
                                <td>{{ $a->jenis_kelamin ?? '-' }}</td>
                                <td>{{ $a->tempat_lahir ?? '-' }}</td>
                                <td>{{ $a->tgl_lahir ?? '-' }}</td>
                                <td>{{ $a->statusAlumni->status ?? '-' }}</td>
                                <td>{{ $a->alamat ?? '-' }}</td>

                          
                                <td>
                                    @if (!$a->email_alumni)
                                        <a href="{{ route('alumni.fillData', ['id' => $a->id_alumni]) }}"
                                            class="btn btn-primary">Tambah Data</a>
                                    @elseif (!$a->isComplete)
                                        <a href="{{ route('alumni.fillData', ['id' => $a->id_alumni]) }}"
                                            class="btn btn-warning">Lengkapi Data</a>
                                    @else
                                        <button class="btn btn-secondary" disabled>Data Sudah Lengkap</button>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="anjay">Tidak ada data alumni ditemukan.</p>
        @endif
    </div>

</body>

</html>
