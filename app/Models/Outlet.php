<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Outlet extends Model
{
    use HasFactory;


    protected $table = "outlet";

    protected $fillable = [
        'nama',
        'alamat_outlet',
        'tlp',
        'biaya_admin',
    ];

    public function voucher(): HasMany {
        return $this->HasMany(Voucher::class);
    }
    public function paket(): HasMany {
        return $this->HasMany(Paket::class);
    }
}
