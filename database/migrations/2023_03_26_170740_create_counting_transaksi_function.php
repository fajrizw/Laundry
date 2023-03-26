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
        FUNCTION `jumlahOutletdi`(`bulan` INT(11), `tahun` INT(11)) 
        RETURNS VARCHAR(100) CHARSET utf8mb4 NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
        BEGIN 
            DECLARE jumlah_outlet INT; IF(bulan > 0 AND bulan < 13) THEN IF(bulan < 10) THEN SELECT count(id) 
            INTO jumlah_outlet 
            FROM outlet 
            WHERE outlet.created_at BETWEEN CONCAT(tahun, "-0", bulan, "-01") AND LAST_DAY(CONCAT(tahun, "-0", bulan, "-01")) 
            AND outlet.deleted_at IS NULL; ELSE SELECT count(id) 
            INTO jumlah_outlet FROM outlet WHERE outlet.created_at BETWEEN CONCAT(tahun, "-", bulan, "-01") 
            AND LAST_DAY(CONCAT(tahun, "-", bulan, "-01")) 
            AND outlet.deleted_at IS NULL; 
            END IF; RETURN CONCAT(jumlah_outlet); 
            ELSE RETURN "Invalid month"; END IF; 
        END 
        SQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counting_transaksi_function');
    }
};
