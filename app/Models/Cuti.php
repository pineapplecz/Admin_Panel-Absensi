<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = ['pegawai_id', 'tanggal_mulai', 'tanggal_selesai', 'alasan'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
