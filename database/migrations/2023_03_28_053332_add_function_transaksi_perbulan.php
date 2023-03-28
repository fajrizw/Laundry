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
      //
        DB::unprepared(<<<SQL
        CREATE DEFINER=`root`@`localhost`
        FUNCTION `jumlahTransaksiPer`(`bulan` INT(11), `tahun` INT(11))
        RETURNS VARCHAR(100) CHARSET utf8mb4 NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER
        BEGIN
            DECLARE jumlah_transaksi INT; IF(bulan > 0 AND bulan < 13) THEN IF(bulan < 10) THEN SELECT count(id)
            INTO jumlah_transaksi
            FROM transaksi
            WHERE transaksi.created_at BETWEEN CONCAT(tahun, "-0", bulan, "-01") AND LAST_DAY(CONCAT(tahun, "-0", bulan, "-01")) ; ELSE SELECT count(id)
            INTO jumlah_transaksi FROM transaksi WHERE transaksi.created_at BETWEEN CONCAT(tahun, "-", bulan, "-01")
            AND LAST_DAY(CONCAT(tahun, "-", bulan, "-01"));
            END IF; RETURN CONCAT(jumlah_transaksi);
            ELSE RETURN "Invalid month"; END IF;
        END
        SQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jumlahTransaksiPerBulan');
    }
};
