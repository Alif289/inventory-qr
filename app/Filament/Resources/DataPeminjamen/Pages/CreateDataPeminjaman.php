<?php

namespace App\Filament\Resources\DataPeminjamen\Pages;

use App\Filament\Resources\DataPeminjamen\DataPeminjamanResource;
use Filament\Resources\Pages\CreateRecord;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class CreateDataPeminjaman extends CreateRecord
{
    protected static string $resource = DataPeminjamanResource::class;
    protected function afterCreate(): void
    {
        $peminjaman = $this->record;
    
        $qrData = url('http://192.168.1.21/scan/peminjaman/' . $peminjaman->id);
    
        $qrImage = QrCode::format('png')->size(300)->generate($qrData);
    
        $path = 'qrcodes/peminjaman-' . $peminjaman->id . '.png';
        Storage::disk('public')->put($path, $qrImage);
    
        $peminjaman->qr_code = $path;
        $peminjaman->save();
    }

        protected function getRedirectUrl(): string
    {
        return route('qrshow', ['type' => 'peminjaman', 'id' => $this->record->id]);
    }

}
