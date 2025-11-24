<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Notification;
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
        'profile_photo',
    ];

    protected $hidden = ['password'];

    // Relasi dengan notifications
    public function notifications()
    {
        return $this->hasMany(\App\Models\Notification::class, 'notifiable_id')
            ->where('notifiable_type', get_class($this))
            ->orderBy('created_at', 'desc');
    }

    // Relasi dengan pesan/testimoni
    public function testimonials()
    {
        return $this->hasMany(PesanKontak::class, 'user_id');
    }
}
