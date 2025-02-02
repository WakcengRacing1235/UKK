<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsentrasiKeahlian extends Model
{
    use HasFactory;

    protected $table = 'tbl_konsentrasi_keahlian';
    protected $primaryKey = 'id_konsentrasi_keahlian';
    public $incrementing = false;
    protected $fillable = ['id_konsentrasi_keahlian', 'id_program_keahlian', 'kode_konsentrasi_keahlian', 'konsentrasi_keahlian'];

    public function programKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class, 'id_program_keahlian', 'id_program_keahlian');
    }

    public function alumnis()
    {
        return $this->hasMany(Alumni::class, 'id_konsentrasi_keahlian', 'id_konsentrasi_keahlian');
    }
    // Relasi ke tabel alumni
    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'id_alumni', 'id_alumni');
    }
}

