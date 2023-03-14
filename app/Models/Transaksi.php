<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Transaksi extends Model
{
    use HasFactory;

    protected $table = "transaksi";

    protected $fillable = [
        "kode_invoice",
        "tgl",
        "batas_waktu",
        "tgl_bayar",
        "dibayar",
        "status"
    ];

    public function member(): BelongsTo {
        return $this->belongsTo(Member::class, 'id_member', 'id');
    }
    public function paket(): BelongsTo {
        return $this->belongsTo(Paket::class, 'id_paket', 'id');
    }

    public function outlet(): BelongsTo {
        return $this->belongsTo(Outlet::class, 'id_outlet', 'id');
    }
}
