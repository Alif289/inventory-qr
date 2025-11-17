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
        Schema::create('data_pengadaans', function (Blueprint $table) {
            $table->id();
            $table->string('Kode_Barang');
            $table->string('Nama_Barang');
            $table->string('Kategori');
            $table->integer('Jumlah_Barang');
            $table->string('Satuan');
            $table->string('Kondisi_Barang');
            $table->string('Lokasi');
            $table->string('qr_code')->nullable();
            $table->timestamp('Tanggal_Pengadaan')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pengadaans');
    }
};
