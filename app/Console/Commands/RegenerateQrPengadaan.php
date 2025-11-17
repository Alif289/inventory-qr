<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DataPengadaan;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class RegenerateQrPengadaan extends Command
{
    protected $signature = 'qr:regen';
    protected $description = 'Regenerate all QR codes for DataPengadaan';

    public function handle()
    {
        $items = DataPengadaan::all();

        foreach ($items as $p) {

            $qrData = url('/qr/pengadaan/' . $p->id);

            $img = QrCode::format('png')->size(300)->generate($qrData);

            $path = 'qrcodes/pengadaan-' . $p->id . '.png';

            Storage::disk('public')->put($path, $img);

            $p->qr_code = $path;
            $p->save();

            $this->info("QR regenerated for ID {$p->id}: {$qrData}");
        }

        $this->info("DONE!");
        return 0;
    }
}

