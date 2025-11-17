<?php

namespace App\Filament\Resources\DataPengadaans\Pages;

use App\Filament\Resources\DataPengadaans\DataPengadaanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListDataPengadaans extends ListRecords
{
    protected static string $resource = DataPengadaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Tambah Barang Baru'),

             Actions\Action::make('print')
                ->label('Print Data')
                ->icon('heroicon-o-printer')
                ->color('gray')
                ->url(route('pdf.pengadaan'))
                ->openUrlInNewTab(),
        ];
    }
}
