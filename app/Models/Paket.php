<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Outlet;

class Paket extends Model
{
    use HasFactory;

    protected $table = "paket";

    protected $fillable = [
        'id_outlet',
        'jenis',
        'nama_paket',
        'harga',
        'estimasi_waktu',
    ];

    public function outlet(): BelongsTo {
        return $this->belongsTo(Outlet::class, 'id_outlet', 'id');
    }


}
