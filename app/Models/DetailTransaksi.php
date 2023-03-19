<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Paket;
use App\Models\Transaksi;
class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = "detail_transaksi";

    protected $fillable = [
        "id_transaksi",
        "id_paket",
        "qty",
        "keterangan"
    ];

    public function transaksi(): BelongsTo {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id');
    }

    public function paket(): BelongsTo {
        return $this->belongsTo(Paket::class, 'id_paket', 'id');
    }
}
