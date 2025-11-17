<?php

namespace App\Filament\Resources\DataBarangs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DataBarangsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->searchable()
                ->sortable(),
                TextColumn::make('Kode_Barang')
                ->searchable()
                ->sortable(),
                TextColumn::make('Nama_Barang')
                ->searchable()
                ->sortable(),
                TextColumn::make('Kategori')
                ->searchable()
                ->sortable(),
                TextColumn::make('Jumlah_Barang')
                ->searchable()
                ->sortable(),
                TextColumn::make('Satuan')
                ->searchable()
                ->sortable(),
                TextColumn::make('Kondisi_Barang')
                ->searchable()
                ->sortable(),
                TextColumn::make('Lokasi')
                ->searchable()
                ->sortable(),
                TextColumn::make('Tanggal_Perubahan')
                ->searchable()
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
