<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanKontak extends Model
{
    use HasFactory;

    protected $table = 'pesan_kontak';

    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'rating',
        'keterangan',
        'status',
        'dibaca_pada',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $dates = [
        'dibaca_pada',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the user that owns the testimonial.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
