<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_outlet");
            $table->string("kode_invoice");
            $table->foreignId("id_member");
            $table->datetime("tgl");
            $table->datetime("batas_waktu");
            $table->datetime("tgl_bayar");
            $table->enum("dibayar",["dibayar","belum dibayar"]);
            $table->enum("status",["baru","proses","selesai","diambil"]);
            $table->foreignId("id_user");
            $table->foreignId("id_voucher");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
