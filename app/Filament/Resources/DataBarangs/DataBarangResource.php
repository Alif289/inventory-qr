<?php

namespace App\Filament\Resources\DataBarangs;

use App\Filament\Resources\DataBarangs\Pages\CreateDataBarang;
use App\Filament\Resources\DataBarangs\Pages\EditDataBarang;
use App\Filament\Resources\DataBarangs\Pages\ListDataBarangs;
use App\Filament\Resources\DataBarangs\Pages\ViewDataBarang;
use App\Filament\Resources\DataBarangs\Schemas\DataBarangForm;
use App\Filament\Resources\DataBarangs\Tables\DataBarangsTable;
use App\Models\DataBarang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DataBarangResource extends Resource
{
    protected static ?string $model = DataBarang::class;

    protected static ?string $navigationLabel = 'Barang';

    protected static ?string $pluralModelLabel = 'Data Barang';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return DataBarangForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataBarangsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataBarangs::route('/'),
            'edit' => EditDataBarang::route('/{record}/edit'),
            'view' => ViewDataBarang::route('/{record}'),
        ];
    }
}
