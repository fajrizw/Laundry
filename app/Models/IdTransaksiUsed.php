<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdTransaksiUsed extends Model
{
    use HasFactory;

    protected $table = "detail_transaksi";

    protected $fillable = [
        "id_transaksi",
    ];
}
