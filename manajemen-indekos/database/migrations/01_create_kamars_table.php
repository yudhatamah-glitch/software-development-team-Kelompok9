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
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kamar')->unique();
            $table->integer('harga');
            $table->text('deskripsi')->nullable();
            $table->enum('status',['kosong','terisi'])->default('kosong');
            $table->decimal('panjang',5,2)->nullable();
            $table->decimal('lebar',5,2)->nullable();
            $table->decimal('tinggi',5,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
