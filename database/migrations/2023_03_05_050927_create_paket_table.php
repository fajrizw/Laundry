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
        Schema::create('paket', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_outlet")->references('id')->on('outlet')->onDelete('cascade');
            $table->enum("jenis",["kiloan","selimut","bed_cover","kaos","lainnya"]);
            $table->string("nama_paket");
            $table->integer("harga");
            $table->integer("estimasi_waktu");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket');
    }
};
