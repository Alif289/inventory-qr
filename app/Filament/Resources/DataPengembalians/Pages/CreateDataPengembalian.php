<?php

namespace App\Filament\Resources\DataPengembalians\Pages;

use App\Filament\Resources\DataPengembalians\DataPengembalianResource;
use Filament\Resources\Pages\CreateRecord;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class CreateDataPengembalian extends CreateRecord
{
    protected static string $resource = DataPengembalianResource::class;
    protected function afterCreate(): void
    {
        $pengembalian = $this->record;
    
        $qrData = url('http://192.168.1.21/scan/pengembalian/' . $pengembalian->id);
    
        $qrImage = QrCode::format('png')->size(300)->generate($qrData);
    
        $path = 'qrcodes/pengembalian-' . $pengembalian->id . '.png';
        Storage::disk('public')->put($path, $qrImage);
    
        $pengembalian->qr_code = $path;
        $pengembalian->save();
    }

        protected function getRedirectUrl(): string
    {
        return route('qrshow', ['type' => 'pengembalian', 'id' => $this->record->id]);
    }
}
