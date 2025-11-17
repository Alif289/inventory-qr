<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Data peminjaman
        Schema::table('data_peminjamen', function (Blueprint $table) {
            $table->boolean('is_executed')->default(false)->after('Tanggal_Peminjaman');
            $table->timestamp('executed_at')->nullable()->after('is_executed');
        });

        // Data pengembalian
        Schema::table('data_pengembalians', function (Blueprint $table) {
            $table->boolean('is_executed')->default(false)->after('Tanggal_Pengembalian');
            $table->timestamp('executed_at')->nullable()->after('is_executed');
        });
    }

    public function down(): void
    {
        Schema::table('data_peminjamen', function (Blueprint $table) {
            $table->dropColumn(['is_executed', 'executed_at']);
        });

        Schema::table('data_pengembalians', function (Blueprint $table) {
            $table->dropColumn(['is_executed', 'executed_at']);
        });
    }
};


