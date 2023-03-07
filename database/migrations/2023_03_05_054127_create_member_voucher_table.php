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
        Schema::create('member_voucher', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_member")->references('id')->on('member')->onDelete('cascade');
            $table->datetime("batas_waktu");
            $table->integer("qty");
            $table->foreignId("id_voucher")->references('id')->on('voucher')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_voucher');
    }
};
