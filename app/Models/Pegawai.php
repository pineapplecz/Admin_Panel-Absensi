<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

   protected $fillable = ['nama', 'jabatan_id', 'email', 'user_id'];

public function user()
{
    return $this->belongsTo(User::class);
}

    /**
     * Relasi ke model Jabatan.
     * Setiap pegawai memiliki satu jabatan.
     */
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
