<?php

namespace App\Filament\Resources\DataBarangs\Pages;

use App\Filament\Resources\DataBarangs\DataBarangResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
use App\Models\DataBarang;
use Filament\Notifications\Notification;


class ListDataBarangs extends ListRecords
{
    protected static string $resource = DataBarangResource::class;

    protected function getHeaderActions(): array
    {
        $barangHampirHabis = DataBarang::where('Jumlah_Barang', '<', 5)->get();

        if ($barangHampirHabis->isNotEmpty()) {
            $pesan = 'Beberapa barang hampir habis: ';
            foreach ($barangHampirHabis as $barang) {
                $pesan .= "{$barang->Nama_Barang} ({$barang->Jumlah_Barang}), ";
            }

            Notification::make()
                ->title('⚠️ Stok Barang Hampir Habis')
                ->body(rtrim($pesan, ', '))
                ->warning()
                ->persistent()
                ->send();
        }
        return [
            Actions\Action::make('print')
                ->label('Print Data')
                ->icon('heroicon-o-printer')
                ->color('gray')
                ->url(route('pdf.barang'))
                ->openUrlInNewTab(),
        ];
    }
}
