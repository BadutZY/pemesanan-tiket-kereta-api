<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $fillable = ['user_id', 'id_penumpang', 'id_jadwal', 'tanggal_pesan', 'jumlah_tiket', 'status'];
    protected $casts = ['tanggal_pesan' => 'date'];

    public function penumpang(): BelongsTo
    {
        return $this->belongsTo(Penumpang::class, 'id_penumpang', 'id_penumpang');
    }
    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id_jadwal');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
