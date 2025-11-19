<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false; // karena tidak ada created_at & updated_at
    protected $primaryKey = 'id_users';

    protected $fillable = [
        'username',
        'password',
        'email',
        'ktp',
        'nomor_hp',
        'asal',
        'profil',
        'tanggal_daftar',
        'role',
    ];

    protected $hidden = ['password'];
}
