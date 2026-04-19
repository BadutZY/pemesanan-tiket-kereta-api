<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penumpang extends Model
{
    protected $table = 'penumpang';
    protected $primaryKey = 'id_penumpang';

    protected $fillable = [
        'nama_penumpang',
        'nik',
        'no_hp',
    ];

    public function getRouteKeyName(): string
    {
        return 'id_penumpang';
    }

    public function pemesanan(): HasMany
    {
        return $this->hasMany(Pemesanan::class, 'id_penumpang', 'id_penumpang');
    }
}
