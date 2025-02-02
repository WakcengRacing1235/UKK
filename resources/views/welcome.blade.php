<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman welcome</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <nav>
        <div class="profile">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>
            <div class="login">
                <button onclick="window.location='{{ route('login') }}';">Login</button>
            </div>
        </div>
        <div class="menu">
            <div class="menu-item">
                {{-- <button onclick="window.location='{{ route('admin.dashboard') }}';">Home</button> --}}
            </div>
            <div class="menu-item">
                <button onclick="window.location='{{ route('login') }}';">Data Alumni</button>
            </div>
            <div class="menu-item">
                <button onclick="window.location='{{ route('login') }}';">Tracer Kuliah</button>
            </div>
            <div class="menu-item">
                <button onclick="window.location='{{ route('login') }}';">Tracer Kerja</button>
            </div>
        </div>
        <div class="menu_dropdown">
            <button class="burger-icon" id="burgerMenu">
                <img src="{{ asset('icons/dropdown.png') }}" alt="Icons">
            </button>
            <ul class="dropdown" id="dropdownMenu">
                <button onclick="window.location='{{ route('login') }}';" class="dropdown-icon">
                    <img src="{{ asset('icons/dropdown.png') }}" alt="Icons">
                </button>
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
            <h2>Selamat Datang, Alumni</h2>
            <h3>terimakasih telah bergabung</h3>
            <h3>disistem Tracer Study</h3>
            <h3><span> Mohon Lengkapi Data Diri Anda </span></h3>
            <h3>untuk mendukung pengembangan</h3>
            <h3>Alumni di masa depan</h3>
        </div>
        @auth
        <div class="info-profil">
            <div class="tabel-profil">
                <div class="profil">
                    <img src="{{ asset('images/profil.png' )}}" alt="profil">
                </div>
                <div class="profil-item">
                    <p>Nama :</p>
                </div>
                <div class="profil-item">
                    <p>Email :</p>
                </div>
                <div class="profil-item">
                    <p>Jurusan :</p>
                </div>
                <div class="profil-item">
                    <p>Tahun lulus :</p>
                </div>
            </div>
            @endauth
        </div>

    </div>
    {{-- <div class="chart-info">
        <h3>Diagram Data Alumni</h3>
    </div>
    <div class="chart-section">
        <div class="chart-container">
            <canvas id="tracerChart"></canvas>
        </div>
        <div class="chart-legend">

            <ul id="legendList"></ul>
            <p>Jumlah Alumni: 600</p>
        </div>
    </div>
    <div class="chart-info">
        <h3>Diagram Data Pekerjaan Alumni</h3>
    </div>
    <div class="chart-section">
        <div class="chart-container">
            <canvas id="tracerChart-kerja"></canvas>
        </div>
        <div class="chart-legend">

            <ul id="legendList-kerja"></ul>
            <p>Jumlah Alumni: 600</p>
        </div>
    </div> --}}
    <script src="{{ asset('js/welcome.js') }}"></script>
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