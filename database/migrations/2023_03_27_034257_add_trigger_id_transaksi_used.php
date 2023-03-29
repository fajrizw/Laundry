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
        CREATE TRIGGER `trig_id_transaksi_used` BEFORE INSERT ON `detail_transaksi`
        FOR EACH ROW BEGIN
          IF EXISTS (SELECT * FROM `table_id_transaksi_used` WHERE `id_transaksi` = NEW.`id_transaksi`) THEN
            SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Id transaksi sudah terpakai";
          END IF;
        END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trig_id_transaksi_used');
    }

};
