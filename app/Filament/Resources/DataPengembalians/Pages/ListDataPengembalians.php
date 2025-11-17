<?php

namespace App\Filament\Resources\DataPengembalians\Pages;

use App\Filament\Resources\DataPengembalians\DataPengembalianResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListDataPengembalians extends ListRecords
{
    protected static string $resource = DataPengembalianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Tambah Pengembalian Barang'),

             Actions\Action::make('print')
                ->label('Print Data')
                ->icon('heroicon-o-printer')
                ->color('gray')
                ->url(route('pdf.pengembalian'))
                ->openUrlInNewTab(),
        ];
        
    }
}
