<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Alumni</title>
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>
<body>
    <div class="container">
        <h2>Detail Alumni</h2>
        <table class="table">
            <tr>
                <th>ID Alumni</th>
                <td>{{ $alumni->id_alumni }}</td>
            </tr>
            <tr>
                <th>Tahun Lulus</th>
                <td>{{ $alumni->tahunlulus->tahun_lulus ?? '-' }}</td>
            </tr>
            <tr>
                <th>Konsentrasi Keahlian</th>
                <td>{{ $alumni->KonsentrasiKeahlian->konsentrasi_keahlian ?? '-'  }}</td>
            </tr>
            <tr>
                <th>Bidang Keahlian</th>
                <td>{{ $alumni->KonsentrasiKeahlian->programKeahlian->BidangKeahlian->bidang_keahlian ?? '-'  }}</td>
            </tr>
            <tr>
                <th>Program Keahlian</th>
                <td>{{ $alumni->KonsentrasiKeahlian->programKeahlian->program_keahlian ?? '-'  }}</td>
            </tr>
            <tr>
                <th>Status Alumni</th>
                <td>{{ $alumni->statusAlumni->status ?? '-'}}</td>
            </tr>
            <tr>
                <th>NISN</th>
                <td>{{ $alumni->nisn }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>{{ $alumni->nik }}</td>
            </tr>
            <tr>
                <th>Nama Depan</th>
                <td>{{ $alumni->nama_depan }}</td>
            </tr>
            <tr>
                <th>Nama Belakang</th>
                <td>{{ $alumni->nama_belakang }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $alumni->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td>{{ $alumni->tempat_lahir }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $alumni->tgl_lahir }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $alumni->alamat }}</td>
            </tr>
            <tr>
                <th>Nomor HP</th>
                <td>{{ $alumni->no_hp }}</td>
            </tr>
            <tr>
                <th>Facebook</th>
                <td>{{ $alumni->akun_fb }}</td>
            </tr>
            <tr>
                <th>Instagram</th>
                <td>{{ $alumni->akun_ig }}</td>
            </tr>
            <tr>
                <th>TikTok</th>
                <td>{{ $alumni->akun_tiktok }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $alumni->email_alumni }}</td>
            </tr>
            <tr>
                <th>Password</th>
                <td>********</td> <!-- Password tidak ditampilkan untuk keamanan -->
            </tr>
            <tr>
                <th>Status Login</th>
                <td>{{ $alumni->status_login == '1' ? 'Aktif' : 'Tidak Aktif' }}</td>
            </tr>
        </tbody>
        </table>
        <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>
