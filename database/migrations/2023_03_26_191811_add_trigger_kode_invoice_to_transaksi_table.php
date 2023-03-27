<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddTriggerKodeInvoiceToTransaksiTable extends Migration
{
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER trigger_kode_invoice
        BEFORE INSERT ON transaksi
        FOR EACH ROW
        BEGIN
          SET NEW.kode_invoice = CONCAT("INV", "-", LPAD(NEW.id, 6, "0"));
        END ;
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS kode_invoice_trigger');
    }
}
