<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;
 
    protected $table = 'tbl_alumni';
    protected $primaryKey = 'id_alumni';
    public $incrementing = false;
    protected $fillable = [
        'id_alumni',
        'id_tahun_lulus',
        'id_konsentrasi_keahlian',
        'id_status_alumni',
        'nisn',
        'nik',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'no_hp',
        'akun_fb',
        'akun_ig',
        'akun_tiktok',
        'email',
        'password',
        'status_login'
    ];

    public function tahunLulus()
    {
        return $this->belongsTo(TahunLulus::class, 'id_tahun_lulus', 'id_tahun_lulus');
    }

    public function konsentrasiKeahlian()
    {
        return $this->belongsTo(KonsentrasiKeahlian::class, 'id_konsentrasi_keahlian', 'id_konsentrasi_keahlian');
    }
    

    public function statusAlumni()
    {
        return $this->belongsTo(StatusAlumni::class, 'id_status_alumni', 'id_status_alumni');
    }
    public function TracerKerja()
    {
        return $this->hasMany(TracerKerja::class, 'id_alumni', 'id_alumni');
    }

    public function TracerKuliah()
    {
        return $this->hasMany(TracerKuliah::class, 'id_alumni', 'id_alumni');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id' , 'email','id_alumni');
    }
    public function testimoni()
    {
        return $this->hasOne(Testimoni::class, 'id_alumni', 'id_alumni'); // Pastikan nama kolom sesuai dengan tabel testimoni
    }
}
