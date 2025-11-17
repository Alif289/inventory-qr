<?php

namespace App\Filament\Resources\DataPengembalians\Pages;

use App\Filament\Resources\DataPengembalians\DataPengembalianResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataPengembalian extends EditRecord
{
    protected static string $resource = DataPengembalianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
