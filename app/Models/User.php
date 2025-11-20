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
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'notifiable_id')
            ->where('notifiable_type', static::class);
    }
}
