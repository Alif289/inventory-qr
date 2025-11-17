<?php

namespace App\Filament\Resources\DataPeminjamen\Pages;

use App\Filament\Resources\DataPeminjamen\DataPeminjamanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataPeminjaman extends EditRecord
{
    protected static string $resource = DataPeminjamanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
