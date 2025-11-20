<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PemesananPaket extends Model
{
    use HasFactory;

    protected $table = 'pemesanan_paket';

    protected $fillable = [
        'user_id',
        'paket',
        'peserta',
        'tanggal_keberangkatan',
        'total',
        'status',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
