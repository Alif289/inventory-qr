<?php

namespace App\Filament\Resources\DataPeminjamen;

use App\Filament\Resources\DataPeminjamen\Pages\CreateDataPeminjaman;
use App\Filament\Resources\DataPeminjamen\Pages\EditDataPeminjaman;
use App\Filament\Resources\DataPeminjamen\Pages\ListDataPeminjamen;
use App\Filament\Resources\DataPeminjamen\Schemas\DataPeminjamanForm;
use App\Filament\Resources\DataPeminjamen\Tables\DataPeminjamenTable;
use App\Models\DataPeminjaman;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DataPeminjamanResource extends Resource
{
    protected static ?string $model = DataPeminjaman::class;

    protected static ?string $navigationLabel = 'Peminjaman';

    protected static ?string $pluralModelLabel = 'Data Peminjaman';

    protected static string|BackedEnum|null $navigationIcon = "heroicon-o-arrow-right-start-on-rectangle";

    public static function form(Schema $schema): Schema
    {
        return DataPeminjamanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataPeminjamenTable::configure($table);
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
            'index' => ListDataPeminjamen::route('/'),
            'create' => CreateDataPeminjaman::route('/create'),
            'edit' => EditDataPeminjaman::route('/{record}/edit'),
        ];
    }
}
