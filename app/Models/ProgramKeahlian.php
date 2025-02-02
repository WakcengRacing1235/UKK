<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    use HasFactory;

    protected $table = 'tbl_program_keahlian';
    protected $primaryKey = 'id_program_keahlian';
    public $incrementing = false;
    protected $fillable = ['id_program_keahlian', 'id_bidang_keahlian', 'kode_program_keahlian', 'program_keahlian'];

    public function bidangKeahlian()
    {
        return $this->belongsTo(BidangKeahlian::class, 'id_bidang_keahlian', 'id_bidang_keahlian');
    }

    public function konsentrasiKeahlian()
    {
        return $this->hasMany(KonsentrasiKeahlian::class, 'id_program_keahlian', 'id_program_keahlian');
    }
    // Relasi ke tabel alumni
    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'id_alumni', 'id_alumni');
    }
}
