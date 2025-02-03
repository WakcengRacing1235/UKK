<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="{{ asset('css/adminalumni.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav_admin.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
        
            /* margin: 0; */
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
        </div>
    </nav>
    
    <div class="container">
        <!-- Form Pencarian -->
        <h2>Data Alumni</h2>
        <form action="{{ route('admin.alumni.index') }}" method="GET" class="search-form">
            <input type="text" name="search" class="search-input" placeholder="Cari alumni..." value="{{ $search }}">
            <button type="submit" class="search-button">Cari</button>
        </form>
    
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NISN</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
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
                @foreach($alumni as $key =>  $alum)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $alum->nisn }}</td>
                    <td>{{ $alum->nik }}</td>
                    <td>{{ $alum->nama_depan }} {{ $alum->nama_belakang }}</td>
                    <td>{{ $alum->jenis_kelamin }}</td>
                    <td>{{ $alum->tempat_lahir }}</td>
                    <td>{{ $alum->tgl_lahir }}</td>
                    <td>{{ $alum->alamat }}</td>
                    <td>{{ $alum->no_hp }}</td>
                    <td>{{ $alum->email }}</td>
                    <td>
                        <a href="{{ route('alumni.show', $alum->id_alumni) }}" class="btn btn-primary">Detail</a>
                        <form action="{{ route('alumni.destroy', $alum->id_alumni) }}" method="POST" >
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
    <script src="{{ asset('js/admin.js') }}"></script>
    
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
</body>
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
</html>
