<div class="top-content">
    <div class="info">
        @if ($alumnis)
            <h3>Selamat Datang, {{ $alumnis->nama_depan }} {{ $alumnis->nama_belakang ?? '' }}</h3>
        @else
            <h3>Selamat Datang, Alumni</h3>
        @endif
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
                    <img src="{{ asset('images/profil.png') }}" alt="profil">
                </div>
                <div class="profil-item">
                    @if ($alumnis)
                        <p>Nama : {{ $alumnis->nama_depan }} {{ $alumnis->nama_belakang ?? '' }}</p>
                    @else
                        <p>Data alumni tidak ditemukan.</p>
                    @endif
                </div>
                <div class="profil-item">
                    <p>Email : {{ Auth::user()->email }}</p>
                </div>
                <div class="profil-item">

                    @if ($alumnis)
                        <p>Jurusan : {{ $alumnis->konsentrasiKeahlian->konsentrasi_keahlian }}</p>
                    @else
                        <p>Jurusan tidak ditemukan.</p>
                    @endif

                </div>
                <div class="profil-item">
                    @if ($alumnis)
                        <p>Tahun Lulus : {{ $alumnis->tahunLulus->tahun_lulus }} </p>
                    @else
                        <p>Tahun Lulus tidak ditemukan.</p>
                    @endif
                </div>
            </div>
        </div>
    @endauth
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