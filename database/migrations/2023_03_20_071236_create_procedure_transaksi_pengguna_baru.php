<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

     DB::unprepared('
     CREATE PROCEDURE transaksi_penggunaBaru(IN idmember INT, idtransaksi INT)

     BEGIN
     SELECT ((detail_transaksi.qty * paket.harga + outlet.biaya_admin + transaksi.pajak ) - ((detail_transaksi.qty * paket.harga + outlet.biaya_admin + transaksi.pajak) * (voucher.diskon/100))) AS transaksi_pertama
     FROM detail_transaksi, transaksi, paket, voucher, member, outlet
     WHERE detail_transaksi.id_transaksi=transaksi.id
         AND detail_transaksi.id_paket=paket.id
         AND transaksi.id_voucher=voucher.id
         AND transaksi.id_member=member.id
         AND transaksi.id_outlet=outlet.id;
     END
     ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedure_transaksi_pengguna_baru');
    }
};
