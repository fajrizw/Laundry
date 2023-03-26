<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE FUNCTION count_transaksi(member_id INT)
            RETURNS INT
            BEGIN
                DECLARE jumlah_transaksi INT;
                SELECT COUNT(*) INTO jumlah_transaksi FROM transaksi,member WHERE transaksi.id_member = member.id AND member.id  = member_id  ;
                RETURN jumlah_transaksi;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP FUNCTION IF EXISTS count_transaksi');
    }
}

?>