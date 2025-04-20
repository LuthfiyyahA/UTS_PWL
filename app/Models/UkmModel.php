<?php

namespace App\Models; //Menandakan bahwa file ini berada di folder App\Models

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model untuk tabel 'ukm'
class UkmModel extends Model
{
    use HasFactory; // Trait untuk mendukung pembuatan data menggunakan factory (fitur testing Laravel)

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'ukm';

    // Primary key dari tabel
    protected $primaryKey = 'ukm_id';

    // Kolom yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'nama',          // Nama UKM
        'deskripsi',     // Deskripsi UKM
        'ketua_umum',    // Nama ketua umum UKM
        'tahun_berdiri', // Tahun berdiri UKM
    ];
}