<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'id_kereta',
        'stasiun_asal',
        'stasiun_tujuan',
        'tanggal_berangkat',
        'jam_berangkat',
    ];

    protected $casts = [
        'tanggal_berangkat' => 'date',
    ];

    public function getRouteKeyName(): string
    {
        return 'id_jadwal';
    }

    public function kereta(): BelongsTo
    {
        return $this->belongsTo(Kereta::class, 'id_kereta', 'id_kereta');
    }

    public function pemesanan(): HasMany
    {
        return $this->hasMany(Pemesanan::class, 'id_jadwal', 'id_jadwal');
    }
}
