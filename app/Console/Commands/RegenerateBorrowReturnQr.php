<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DataPeminjaman;
use App\Models\DataPengembalian;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class RegenerateBorrowReturnQr extends Command
{
    protected $signature = 'qr:regen-borrow-return {--only-missing}';
    protected $description = 'Regenerate QR images for DataPeminjaman and DataPengembalian';

    public function handle()
    {
        $this->info('Regenerating QR for DataPeminjaman...');
        $query = DataPeminjaman::query();
        if ($this->option('only-missing')) $query->whereNull('qr_code')->orWhere('qr_code','');
        foreach ($query->get() as $p) {
            $url = 'qr/peminjaman/' . $p->id;
            $img = QrCode::format('png')->size(300)->generate($url);
            $path = 'qrcodes/peminjaman-' . $p->id . '.png';
            Storage::disk('public')->put($path, $img);
            $p->qr_code = $path;
            $p->save();
            $this->line("Peminjaman #{$p->id} -> {$url}");
        }

        $this->info('Regenerating QR for DataPengembalian...');
        $q2 = DataPengembalian::query();
        if ($this->option('only-missing')) $q2->whereNull('qr_code')->orWhere('qr_code','');
        foreach ($q2->get() as $r) {
            $url = 'qr/pengembalian/' . $r->id;
            $img = QrCode::format('png')->size(300)->generate($url);
            $path = 'qrcodes/pengembalian-' . $r->id . '.png';
            Storage::disk('public')->put($path, $img);
            $r->qr_code = $path;
            $r->save();
            $this->line("Pengembalian #{$r->id} -> {$url}");
        }

        $this->info('Done.');
        return 0;
    }
}
