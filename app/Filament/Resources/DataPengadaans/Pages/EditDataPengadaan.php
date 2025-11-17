<?php

namespace App\Filament\Resources\DataPengadaans\Pages;

use App\Filament\Resources\DataPengadaans\DataPengadaanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataPengadaan extends EditRecord
{
    protected static string $resource = DataPengadaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
