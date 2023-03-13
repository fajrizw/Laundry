<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paket extends Model
{
    use HasFactory;

    protected $table = "paket";

    protected $fillable = [
        'jenis',
        'nama_paket',
        'harga',
        'estimasi_waktu',
    ];

    public function outlet(): BelongsTo {
        return $this->belongsTo(Outlet::class);
    }
}
