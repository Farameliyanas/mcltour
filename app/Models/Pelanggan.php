<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'alamat',
        'nomor_telp',
        'jenis_kelamin',
        'username',
        'password',
        'role'
    ];

    public $timestamps = false;

    // Menambahkan filter otomatis pada query di dalam boot method
    protected static function boot()
    {
        parent::boot();

        // Tambahkan filter untuk hanya mengambil pelanggan dengan role 'user'
        static::addGlobalScope('roleUser', function ($builder) {
            $builder->where('role', 'user');
        });
    }
}
