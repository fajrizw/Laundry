<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Voucher extends Model
{
    use HasFactory;

    protected $table = "voucher";

    protected $fillable = [
        'nama',
        'diskon',
    ];

    public function outlet(): BelongsTo {
        return $this->belongsTo(Outlet::class);
    }
}
