<?php

namespace App\Filament\Resources\DataPengembalians;

use App\Filament\Resources\DataPengembalians\Pages\CreateDataPengembalian;
use App\Filament\Resources\DataPengembalians\Pages\EditDataPengembalian;
use App\Filament\Resources\DataPengembalians\Pages\ListDataPengembalians;
use App\Filament\Resources\DataPengembalians\Schemas\DataPengembalianForm;
use App\Filament\Resources\DataPengembalians\Tables\DataPengembaliansTable;
use App\Models\DataPengembalian;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DataPengembalianResource extends Resource
{
    protected static ?string $model = DataPengembalian::class;

    protected static ?string $navigationLabel = 'Pengembalian';

    protected static ?string $pluralModelLabel = 'Data Pengembalian';

    protected static string|BackedEnum|null $navigationIcon = "heroicon-o-arrow-left-end-on-rectangle";

    public static function form(Schema $schema): Schema
    {
        return DataPengembalianForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataPengembaliansTable::configure($table);
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
            'index' => ListDataPengembalians::route('/'),
            'create' => CreateDataPengembalian::route('/create'),
            'edit' => EditDataPengembalian::route('/{record}/edit'),
        ];
    }
}
