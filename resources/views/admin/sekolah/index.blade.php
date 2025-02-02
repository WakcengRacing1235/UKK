<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sekolah</title>
    <link rel="stylesheet" href="{{ asset('css/sekolah.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav_admin.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <button type="submit" class="dropdown-icon">
                        <img src="{{ asset('icons/logout.png') }}" alt="Logout Icon">
                    </button>
                </form>
            </ul>
        </div>
    </nav>
    <h1>Daftar Sekolah</h1>
    <div class="tmbh">
        <a href="{{ route('sekolah.create') }}">Tambah Sekolah</a>
    </div>

    <div class="table-responsive">
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NPSN</th>
                    <th>NSS</th>
                    <th>Nama Sekolah</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Website</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sekolah as $sekolahs)
                    <tr>
                        <td>{{ $sekolahs->id_sekolah }}</td>
                        <td>{{ $sekolahs->npsn }}</td>
                        <td>{{ $sekolahs->nss }}</td>
                        <td>{{ $sekolahs->nama_sekolah }}</td>
                        <td>{{ $sekolahs->alamat }}</td>
                        <td>{{ $sekolahs->no_telp }}</td>
                        <td>{{ $sekolahs->website }}</td>
                        <td>{{ $sekolahs->email }}</td>
                        <td>
                            <a href="{{ route('sekolah.edit', $sekolahs->id_sekolah) }}" class="btn-edit">Edit</a> |
                            <form action="{{ route('sekolah.destroy', $sekolahs->id_sekolah) }}" method="POST" class="form-hapus" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn-delete" onclick="confirmDelete(this)">Hapus</button>
                            </form>                        
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">Tidak ada data sekolah.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
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
<script src="{{ asset('js/admin.js') }}"></script>

</html>
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
