<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lengkapi Data Alumni</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Lengkapi Data Alumni</h2>

        <form method="POST" action="{{ route('alumni.tracerstudy.storeFilledData', ['id' => $alumni->id_alumni]) }}">

            @csrf

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                @if (!$alumni->jenis_kelamin)
                    <select name="jenis_kelamin" class="form-control">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                @else
                    <input type="text" class="form-control" value="{{ $alumni->jenis_kelamin }}" disabled>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                @if (!$alumni->tempat_lahir)
                    <input type="text" name="tempat_lahir" class="form-control">
                @else
                    <input type="text" class="form-control" value="{{ $alumni->tempat_lahir }}" disabled>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                @if (!$alumni->tgl_lahir)
                    <input type="date" name="tgl_lahir" class="form-control">
                @else
                    <input type="text" class="form-control" value="{{ $alumni->tgl_lahir }}" disabled>
                @endif
            </div>
            <div class="mb-3">
                <label for="id_status_alumni">Status Alumni</label>
                <select name="id_status_alumni" class="form-control" required>
                    <option value="" disabled selected> Pilih Status Anda</option>
                    @foreach ($status_alumni as $s)
                        <option value="{{ $s->id_status_alumni }}">{{ $s->status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                @if (!$alumni->alamat)
                    <input type="text" name="alamat" class="form-control">
                @else
                    <input type="text" class="form-control" value="{{ $alumni->alamat }}" disabled>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">No HP</label>
                @if (!$alumni->no_hp)
                    <input type="text" name="no_hp" class="form-control">
                @else
                    <input type="text" class="form-control" value="{{ $alumni->no_hp }}" disabled>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Akun Facebook</label>
                @if (!$alumni->akun_fb)
                    <input type="text" name="akun_fb" class="form-control">
                @else
                    <input type="text" class="form-control" value="{{ $alumni->akun_fb }}" disabled>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Akun Instagram</label>
                @if (!$alumni->akun_ig)
                    <input type="text" name="akun_ig" class="form-control">
                @else
                    <input type="text" class="form-control" value="{{ $alumni->akun_ig }}" disabled>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Akun TikTok</label>
                @if (!$alumni->akun_tiktok)
                    <input type="text" name="akun_tiktok" class="form-control">
                @else
                    <input type="text" class="form-control" value="{{ $alumni->akun_tiktok }}" disabled>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Email (Alumni)</label>
                @if (!$alumni->email_alumni)
                    <input type="email" name="email_alumni" class="form-control" required>
                @else
                    <input type="email" class="form-control" value="{{ $alumni->email_alumni }}" disabled>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-3 mb-3">Simpan</button>
            <a href="{{ route('alumni.tracerstudy.search') }}" class="btn btn-secondary mt-3 mb-3">Kembali</a>

        </form>
    </div>
</body>

</html>
