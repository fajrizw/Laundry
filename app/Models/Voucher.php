<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Outlet;

class Voucher extends Model
{
    use HasFactory;

    protected $table = "voucher";

    protected $fillable = [
        'nama',
        'diskon',
        'id_outlet'
    ];

    public function outlet(): BelongsTo {
        return $this->belongsTo(Outlet::class, "id_outlet", "id");
    }
}
