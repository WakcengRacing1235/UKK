@extends('layouts.alum_app')

@section('content')

<script>
    @if (session('success-store'))
        Swal.fire({
            title: 'Anda Berhasil Terdaftar Sebagai Alumni!',
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
<div class="container">
    <h1 class="mt-4">Daftar Alumni</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('alumni.Dataalumni.index') }}" method="GET" class="search-form">
        <input type="text" name="search" class="search-input" placeholder="Cari alumni..." value="{{ $search }}">
        <button type="submit" class="search-button">Cari</button>
    </form>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NISN</th>
                <th>NIK</th>
                <th>Tahun Lulus</th>
                <th>Status Alumni</th>
                <th>Jenis Kelamin</th>
                <th>Konsentrasi Keahlian</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($alumni as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nama_depan }} {{ $item->nama_belakang }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->tahunlulus->tahun_lulus ?? '-' }}</td>
                    <td>{{ $item->statusAlumni->status ?? '-' }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->konsentrasiKeahlian->konsentrasi_keahlian ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data alumni</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $alumni->withQueryString()->links() }}
</div>
@endsection
