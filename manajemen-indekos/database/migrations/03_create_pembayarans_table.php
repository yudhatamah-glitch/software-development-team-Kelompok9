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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penghuni_id')->constrained('penghuni')->cascadeOnDelete();

            $table->integer('bulan');
            $table->integer('tahun');

            $table->integer('tagihan');
            $table->integer('dibayar')->default(0);

            $table->enum('status',['belum','cicil','lunas'])->default('belum');

            $table->date('tanggal_bayar')->nullable();
            $table->date('jatuh_tempo')->nullable();

            $table->timestamps();

            $table->unique(['penghuni_id','bulan','tahun']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
