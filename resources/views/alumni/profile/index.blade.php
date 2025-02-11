@extends('layouts.alum_app')

@section('content')
    <div class="table-section">
        <h1>Data Diri</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NISN</th>
                    <th>NIK</th>
                    <th>Nama lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($alumni)
                    <tr>
                        <td>{{ $alumni->id_alumni }}</td>
                        <td>{{ $alumni->nisn }}</td>
                        <td>{{ $alumni->nik }}</td>
                        <td>{{ $alumni->nama_depan }} {{ $alumni->nama_belakang }}</td>
                        <td>{{ $alumni->jenis_kelamin }}</td>
                        <td>{{ $alumni->tempat_lahir }}</td>
                        <td>{{ $alumni->tgl_lahir }}</td>
                        <td>{{ $alumni->alamat }}</td>
                        <td>{{ $alumni->no_hp }}</td>
                        <td>{{ $alumni->email_alumni }}</td>
                        <td>
                            <a href="{{ route('profile.alumni', $alumni->id_alumni) }}" class="btn btn-danger">Edit</a>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="12" class="text-center">Data belum tersedia.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="table-section">
        <h1>Data Kuliah</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Alumni</th>
                    <th>Nama Kampus</th>
                    <th>Status</th>
                    <th>Jenjang</th>
                    <th>Jurusan</th>
                    <th>Linier</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($tracerKuliah)
                    <tr>
                        <td>{{ $tracerKuliah->id_tracer_kuliah }}</td>
                        <td>{{ $tracerKuliah->alumni ? $tracerKuliah->alumni->nama_depan . ' ' . $tracerKuliah->alumni->nama_belakang : 'Tidak Ditemukan' }}
                        </td>
                        <td>{{ $tracerKuliah->tracer_kuliah_kampus }}</td>
                        <td>{{ $tracerKuliah->tracer_kuliah_status }}</td>
                        <td>{{ $tracerKuliah->tracer_kuliah_jenjang }}</td>
                        <td>{{ $tracerKuliah->tracer_kuliah_jurusan }}</td>
                        <td>{{ $tracerKuliah->tracer_kuliah_linier }}</td>
                        <td>{{ $tracerKuliah->tracer_kuliah_alamat }}</td>
                        <td>
                            <a href="{{ route('profile.kuliah', $tracerKuliah->id_tracer_kuliah) }}"
                                class="btn btn-danger">Edit</a>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="9" class="text-center">Data belum tersedia.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="table-section">
        <h1>Data Pekerjaan</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Alumni</th>
                    <th>Nama Pekerjaan</th>
                    <th>Nama Perusahaan</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Lokasi</th>
                    <th>Alamat</th>
                    <th>Tanggal Mulai</th>
                    <th>Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($tracerKerja)
                    <tr>
                        <td>{{ $tracerKerja->id_tracer_kerja }}</td>
                        <td>{{ $tracerKerja->alumni ? $tracerKerja->alumni->nama_depan . ' ' . $tracerKerja->alumni->nama_belakang : 'Tidak Ditemukan' }}
                        </td>
                        <td>{{ $tracerKerja->tracer_kerja_pekerjaan }}</td>
                        <td>{{ $tracerKerja->tracer_kerja_nama }}</td>
                        <td>{{ $tracerKerja->tracer_kerja_jabatan }}</td>
                        <td>{{ $tracerKerja->tracer_kerja_status }}</td>
                        <td>{{ $tracerKerja->tracer_kerja_lokasi }}</td>
                        <td>{{ $tracerKerja->tracer_kerja_alamat }}</td>
                        <td>{{ $tracerKerja->tracer_kerja_tgl_mulai }}</td>
                        <td>{{ $tracerKerja->tracer_kerja_gaji }}</td>
                        <td>
                            <a href="{{ route('profile.kerja', $tracerKerja->id_tracer_kerja) }}"
                                class="btn btn-danger">Edit</a>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="11" class="text-center">Data belum tersedia.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <script>
        @if (session('error'))

            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif

        @if (session('success-update'))

            Swal.fire({
                title: 'Sukses!',
                text: '{{ session('success-update') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
        @if (session('success-edit-alumni'))
            Swal.fire({
                title: 'Anda Telah Memperbarui Data Alumni!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
        @if (session('success-edit-kerja'))
            Swal.fire({
                title: 'Anda Telah Memperbarui Data Kerja!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
        @if (session('success-edit-kuliah'))
            Swal.fire({
                title: 'Anda Telah Memperbarui Data Kuliah!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
        document.getElementById('logout-btn').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan keluar dari akun ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, logout!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit(); // Jika ya, submit form logout
                }
            });
        });
    </script>
@endsection
