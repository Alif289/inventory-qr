<?php

namespace App\Filament\Resources\DataBarangs\Pages;

use App\Filament\Resources\DataBarangs\DataBarangResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataBarang extends EditRecord
{
    protected static string $resource = DataBarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
