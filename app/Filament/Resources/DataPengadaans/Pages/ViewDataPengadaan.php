<?php

namespace App\Filament\Resources\DataPengadaans\Pages;

use App\Filament\Resources\DataPengadaans\DataPengadaanResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewDataPengadaan extends ViewRecord
{
    protected static string $resource = DataPengadaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Back')
                ->url(DataPengadaanResource::getUrl('index'))
                ->color('success')
                ->icon('heroicon-o-arrow-left')
        ];
    }
}
