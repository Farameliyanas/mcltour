<?php

// File: app/Models/Admin.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'users'; // Sesuaikan dengan nama tabel yang digunakan untuk admin

    protected $fillable = [
        'name', 'email', 'password', 'alamat', 'nomor_telp', 'jenis_kelamin', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}