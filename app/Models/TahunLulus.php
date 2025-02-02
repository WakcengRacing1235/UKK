<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunLulus extends Model
{
    use HasFactory;

    protected $table = 'tb_tahun_lulus';
    protected $primaryKey = 'id_tahun_lulus';
    public $incrementing = true; // Jika ID bukan auto-increment
    protected $fillable = ['id_tahun_lulus', 'tahun_lulus', 'keterangan'];

    public function alumnis()
    {
        return $this->hasMany(Alumni::class, 'id_tahun_lulus', 'id_tahun_lulus');
    }
}
