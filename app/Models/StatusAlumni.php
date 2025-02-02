<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAlumni extends Model
{
    use HasFactory;

    protected $table = 'tbl_status_alumni';
    protected $primaryKey = 'id_status_alumni';
    public $incrementing = false;
    protected $fillable = ['id_status_alumni', 'status'];

    public function alumnis()
    {
        return $this->hasMany(Alumni::class, 'id_status_alumni', 'id_status_alumni');
    }
}
