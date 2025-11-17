<?php

namespace App\Filament\Resources\DataPengadaans\Pages;

use App\Filament\Resources\DataPengadaans\DataPengadaanResource;
use Filament\Resources\Pages\CreateRecord;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class CreateDataPengadaan extends CreateRecord
{
    protected static string $resource = DataPengadaanResource::class;
    protected function afterCreate(): void
    {
        $pengadaan = $this->record;

        $qrData = url('http://192.168.1.21/scan/pengadaan/' . $pengadaan->id);

        $qrImage = QrCode::format('png')->size(300)->generate($qrData);

        $path = 'qrcodes/pengadaan-' . $pengadaan->id . '.png';
        Storage::disk('public')->put($path, $qrImage);

        $pengadaan->qr_code = $path;
        $pengadaan->save();
    }

    protected function getRedirectUrl(): string
    {
        return route('qrshow', ['type' => 'pengadaan', 'id' => $this->record->id]);
    }
}
