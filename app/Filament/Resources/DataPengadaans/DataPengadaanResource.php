<?php

namespace App\Filament\Resources\DataPengadaans;

use App\Filament\Resources\DataPengadaans\Pages\CreateDataPengadaan;
use App\Filament\Resources\DataPengadaans\Pages\EditDataPengadaan;
use App\Filament\Resources\DataPengadaans\Pages\ListDataPengadaans;
use App\Filament\Resources\DataPengadaans\Pages\ViewDataPengadaan;
use App\Filament\Resources\DataPengadaans\Schemas\DataPengadaanForm;
use App\Filament\Resources\DataPengadaans\Tables\DataPengadaansTable;
use App\Models\DataPengadaan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DataPengadaanResource extends Resource
{
    protected static ?string $model = DataPengadaan::class;

    protected static ?string $navigationLabel = 'Pengadaan';

    protected static ?string $pluralModelLabel = 'Data Pengadaan';

    protected static string|BackedEnum|null $navigationIcon = "heroicon-o-archive-box-arrow-down";

    public static function form(Schema $schema): Schema
    {
        return DataPengadaanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataPengadaansTable::configure($table);
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
            'index' => ListDataPengadaans::route('/'),
            'create' => CreateDataPengadaan::route('/create'),
            'edit' => EditDataPengadaan::route('/{record}/edit'),
            'view' => ViewDataPengadaan::route('/{record}'),
        ];
    }
}
