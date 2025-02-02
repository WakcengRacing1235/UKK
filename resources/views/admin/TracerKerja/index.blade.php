<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="{{ asset('css/kerja.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav_admin.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {

            height: 800px;
            display: flex;
            flex-direction: column;
            margin: 0;
        }
    </style>
</head>

<body>

    <nav>
        <div class="profile">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>
            <div class="Username">
                {{ Auth::user()->name }}
            </div>
        </div>
        <div class="menu">
            <div class="menu-item">
                <button onclick="window.location='{{ route('admin.dashboard') }}';">Home</button>
            </div>
            <div class="menu-item">
                <button onclick="window.location='{{ route('admin.alumni.index') }}';">Data Alumni</button>
            </div>
            <div class="menu-item">
                <button onclick="window.location='{{ route('admin.TracerKuliah.index') }}';">Tracer Kuliah</button>
            </div>
            <div class="menu-item">
                <button onclick="window.location='{{ route('admin.TracerKerja.index') }}';">Tracer Kerja</button>
            </div>
            <div class="menu-item">
                <button onclick="window.location='{{ route('testimoni.index') }}';">Testimoni</button>
            </div>
        </div>
        <div class="menu_dropdown">
            <button class="burger-icon" id="burgerMenu">
                <img src="{{ asset('icons/dropdown.png') }}" alt="Icons">
            </button>
            <ul class="dropdown" id="dropdownMenu">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="dropdown-icon" id="logout-btn">
                        <img src="{{ asset('icons/logout.png') }}" alt="Logout Icon">
                    </button>
                </form>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>Data Tracer Kerja</h2>
        <form action="{{ route('admin.TracerKerja.index') }}" method="GET" class="search-form">
            <input type="text" name="search" class="search-input" placeholder="Cari berdasarkan Nama Perusahaan."
                value="{{ $search }}">
            <button type="submit" class="search-button">Cari</button>
        </form>
        <table class="table">
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
                @foreach ($tracerKerja as $key => $kerja)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $kerja->alumni ? $kerja->alumni->nama_depan . ' ' . $kerja->alumni->nama_belakang : 'Tidak Ditemukan' }}
                        </td>
                        <td>{{ $kerja->tracer_kerja_pekerjaan }}</td>
                        <td>{{ $kerja->tracer_kerja_nama }}</td>
                        <td>{{ $kerja->tracer_kerja_jabatan }}</td>
                        <td>{{ $kerja->tracer_kerja_status }}</td>
                        <td>{{ $kerja->tracer_kerja_lokasi }}</td>
                        <td>{{ $kerja->tracer_kerja_alamat }}</td>
                        <td>{{ $kerja->tracer_kerja_tgl_mulai }}</td>
                        <td>{{ $kerja->tracer_kerja_gaji }}</td>
                        <td>
                            <form action="{{ route('TracerKerja.destroy', $kerja->id_tracer_kerja) }}"class="form-hapus" style="display:inline;" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function confirmDelete(button) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Data yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Cari form terdekat dengan tombol ini dan submit
                button.closest('form').submit();
            }
        });
    }
    document.getElementById('logout-btn').addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah Admin yakin?',
                    text: "Admin akan keluar dari akun ini!",
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
    <script src="{{ asset('js/admin.js') }}"></script>
    <footer class="footer">
        <div class="footer-content">
            <p>Copyright © 2024-2027 Andika. Hak Cipta. All rights reserved.</p>
            <div class="social-icons">
                <a href="#" class="social-icon-1">
                    <img src="{{ asset('images/tk.png') }}" alt="Logo">
                </a>
                <a href="#" class="social-icon">
                    <img src="{{ asset('images/ig.jfif') }}" alt="Logo">
                </a>
            </div>
        </div>
    </footer>
</body>

</html>
