<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/alumni.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataalumni.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

    <link rel="stylesheet" href="{{ asset('css/nav_alumni.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



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
                <button onclick="window.location='{{ route('alumni.dashboard') }}';">Home</button>
            </div>
            <div class="menu-item">
                <button onclick="window.location='{{ route('alumni.Dataalumni.index') }}';">Data Alumni</button>
            </div>
            <div class="menu-item">
                <button onclick="window.location='{{ route('tracerstudy.create') }}';">Tracer Study</button>
            </div>
            <div class="menu-item">
                <button onclick="window.location='{{ route('alumni.tracerkuliah.create') }}';">Tracer Kuliah</button>
            </div>
            <div class="menu-item">
                <button onclick="window.location='{{ route('alumni.tracerkerja.create') }}';">Tracer Kerja</button>
            </div>
            <div class="menu-item">
                <button onclick="window.location='{{ route('testimoni.create') }}';">Testimoni</button>
            </div>
        </div>
        <div class="menu_dropdown">
            <button class="burger-icon" id="burgerMenu">
                <img src="{{ asset('icons/dropdown.png') }}" alt="Icons">
            </button>
            <ul class="dropdown" id="dropdownMenu">
                <form id="profile-form" action="{{ route('alumni.profile.index') }}" method="GET"
                    style="display: inline;">
                    @csrf
                    <button type="submit" class="dropdown-icon">
                        <img src="{{ asset('icons/profile.png') }}" alt="Logout Icon">
                    </button>
                </form>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="dropdown-icon" id="logout-btn">
                        <img src="{{ asset('icons/logout.png') }}" alt="Logout Icon">
                    </button>
                </form>

            </ul>
        </div>
    </nav>

    <div>
        @yield('content')
    </div>

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

{{-- <script> console.log(@json($statusData));</script> --}}
<script src="{{ asset('js/alumni.js') }}"></script>


<script>
    @if (session('success-Alumni'))
        Swal.fire({
            title: 'Anda Telah Terdaftar Sebagai Alumni!',
            text: '{{ session('success') }}',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    @endif
    @if (session('success-store'))
        Swal.fire({
            title: 'Anda Telah Mendaftar Sebagai Alumni!',
            text: '{{ session('success') }}',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    @endif
    @if (session('success-test-create'))
        Swal.fire({
            title: 'Anda Hanya Bisa mengisi Testimoni Sebanyak 1x',
            text: '{{ session('success') }}',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    @endif
    @if (session('success-kerja-create'))
        Swal.fire({
            title: 'Anda Hanya Bisa mengisi Tracer kerja Sebanyak 1x',
            text: '{{ session('success') }}',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    @endif
    @if (session('success-kuliah-create'))
        Swal.fire({
            title: 'Anda Hanya Bisa mengisi Tracer Kuliah Sebanyak 1x',
            text: '{{ session('success') }}',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    @endif
  
    @if (session('success-kerja'))
        Swal.fire({
            title: 'Data Pekerjaan Anda Telah Berhasil Terdaftar!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif
    @if (session('success-kuliah'))
        Swal.fire({
            title: 'Data Kuliah Anda Telah Berhasil Terdaftar!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif
    @if (session('success-test'))
        Swal.fire({
            title: 'Data Kuliah Anda Telah Berhasil Terdaftar!',
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

</html>
