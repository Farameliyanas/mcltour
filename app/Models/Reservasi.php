<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';
    protected $fillable = [
        'name',
        'nama_paket',
        'paket_wisata_id',
        'jml_pax',
        'no_telp',
        'tanggal_reservasi',
        'spesial_request',
        'total_bayar',
        'status_bayar',
        'created_by',
    ];

    // Menambahkan scope untuk menyaring berdasarkan status_bayar
    public function scopePembayaranSatu($query)
    {
        return $query->where('status_bayar', 1);
    }
}
