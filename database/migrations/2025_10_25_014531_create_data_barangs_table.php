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
        Schema::create('data_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('Kode_Barang')->nullable();
            $table->string('Nama_Barang')->nullable();
            $table->string('Kategori')->nullable();
            $table->integer('Jumlah_Barang')->nullable();
            $table->string('Satuan')->nullable();
            $table->string('Kondisi_Barang')->nullable();
            $table->string('Lokasi')->nullable();
            $table->timestamp('Tanggal_Perubahan')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_barangs');
    }
};
