<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav_admin.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <div class="top-content">
        <div class="info">
            <h2>Selamat Datang, Admin </h2>
            <h3>terimakasih telah meluangkan waktu </h3>
            <h3>disistem Tracer Study</h3>
            <h3><span> Pantau Data Alumni </span></h3>
            <h3> dan Laporan Tracer Study </h3>
            <h3>dengan Mudah</h3>
        </div>
        <div class="info-profil">
            <h3>Kelola Data</h3>
            <div class="admin-actions">
                <button onclick="window.location='{{ route('sekolah.index') }}';">Kelola Sekolah</button>
                <button onclick="window.location='{{ route('program.index') }}';">Kelola Program Keahlian</button>
                <button onclick="window.location='{{ route('konsentrasi.index') }}';">Kelola Konsentrasi
                    Keahlian</button>
                <button onclick="window.location='{{ route('bidang.index') }}';">Kelola Bidang Keahlian</button>
                <button onclick="window.location='{{ route('status-alumni.index') }}';">Kelola Status Alumni</button>
                <button onclick="window.location='{{ route('tahun-lulus.index') }}';">Kelola Tahun Lulus</button>
                {{-- <button onclick="window.location='{{ route('testimoni.index') }}';">Testimoni</button> --}}
            </div>
        </div>
    </div>
    <div class="chart-info">
        <h3>Diagram Data Status Alumni</h3>
    </div>
    <div class="chart-section">
        <div class="chart-container">
            <canvas id="tracerChart" data-id="{{ $diagram }}"></canvas>
        </div>
        <div class="chart-legend">

            <ul id="legendList"></ul>

        </div>
    </div>
    <div class="testimoni-section">
        <h3>Testimoni Alumni</h3>
        <div class="testimoni-container">
            @foreach($testimonis as $testimoni)
                <div class="testimoni-card">
                    <div class="testimoni-header">
                        <div class="testimoni-info">
                            <h4>{{ $testimoni->alumni->nama_depan }} {{ $testimoni->alumni->nama_belakang }}</h4>

                            <p><strong>Tanggal:</strong> {{ $testimoni->tgl_testimoni }}</p>
                        </div>
                    </div>
                    <div class="testimoni-body">
                        <p>"{{ $testimoni->testimoni }}"</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <script>
        document.getElementById('logout-btn').addEventListener('click', function (e) {
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
                <a href="https://www.tiktok.com/@diklonz?_t=ZS-8tC59F44Wlb&_r=1" class="social-icon-1">
                    <img src="{{ asset('images/tk.png') }}" alt="Logo">
                </a>
                <a href="https://www.instagram.com/wakceng_17?igsh=MWIxd2E3YTdmdjhqOQ==" class="social-icon">
                    <img src="{{ asset('images/ig.jfif') }}" alt="Logo">
                </a>
            </div>
        </div>
    </footer>
</body>

</html>