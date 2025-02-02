<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerKerja extends Model
{
    use HasFactory;

    protected $table = 'tbl_tracer_kerja'; // Nama tabel di database
    protected $primaryKey = 'id_tracer_kerja'; // Primary key tabel
    public $timestamps = false; // Nonaktifkan timestamps jika tidak digunakan

    protected $fillable = [
        'id_alumni',
        'tracer_kerja_pekerjaan',
        'tracer_kerja_nama',
        'tracer_kerja_jabatan',
        'tracer_kerja_status',
        'tracer_kerja_lokasi',
        'tracer_kerja_alamat',
        'tracer_kerja_tgl_mulai',
        'tracer_kerja_gaji',
    ];

    // Relasi ke tabel alumni
    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'id_alumni', 'id_alumni');
    }
}
