<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\User;
use App\Models\Voucher;
class Transaksi extends Model
{   
    
    use HasFactory;

    protected $table = "transaksi";

    protected $fillable = [
        "kode_invoice",
        "id_outlet",
        "id_member",
        "tgl",
        "batas_waktu",
        "tgl_bayar",
        "status_pembayaran",
        "status_pemesanan",
        "id_user",
        "id_voucher",
        "id_paket"
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

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function voucher(): BelongsTo {
        return $this->belongsTo(User::class, 'id_voucher', 'id');
    }

    public function detail_transaksi(): HasMany {
        return $this->hasMany(Outlet::class, "id", "id_detail_transaksi");
    }
}
