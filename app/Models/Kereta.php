<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kereta extends Model
{
    protected $table = 'kereta';
    protected $primaryKey = 'id_kereta';

    protected $fillable = [
        'nama_kereta',
        'kelas',
    ];

    public function getRouteKeyName(): string
    {
        return 'id_kereta';
    }

    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class, 'id_kereta', 'id_kereta');
    }
}
