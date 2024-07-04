<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisata'; // Nama tabel di basis data

    protected $fillable = [
        'destinasi','nama_wisata','harga' // Kolom yang dapat diisi secara massal (mass assignable)
        // Jika Anda membutuhkan tambahan kolom, tambahkan di sini
    ];

    // Secara default, Eloquent akan mengasumsikan bahwa primary key dari tabel adalah 'id'.
    // Jika nama primary key di tabel Anda berbeda, Anda perlu menetapkannya secara manual.
    protected $primaryKey = 'idwisata';

    // Jika Anda tidak memiliki kolom created_at dan updated_at di tabel Anda, Anda dapat menonaktifkannya.
    public $timestamps = false;
}
