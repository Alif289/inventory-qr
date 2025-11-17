<?php

namespace App\Filament\Resources\DataPeminjamen\Pages;

use App\Filament\Resources\DataPeminjamen\DataPeminjamanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListDataPeminjamen extends ListRecords
{
    protected static string $resource = DataPeminjamanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Tambah Peminjaman Barang'),

             Actions\Action::make('print')
                ->label('Print Data')
                ->icon('heroicon-o-printer')
                ->color('gray')
                ->url(route('pdf.peminjaman'))
                ->openUrlInNewTab(),
        ];
    }
}
