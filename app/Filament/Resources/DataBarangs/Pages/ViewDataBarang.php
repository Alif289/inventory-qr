<?php

namespace App\Filament\Resources\DataBarangs\Pages;

use App\Filament\Resources\DataBarangs\DataBarangResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewDataBarang extends ViewRecord
{
    protected static string $resource = DataBarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
             Action::make('back')
                ->label('Back')
                ->url(DataBarangResource::getUrl('index'))
                ->color('success')
                ->icon('heroicon-o-arrow-left')
        ];
    }
}
