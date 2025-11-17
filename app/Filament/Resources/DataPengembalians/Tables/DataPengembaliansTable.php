<?php

namespace App\Filament\Resources\DataPengembalians\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class DataPengembaliansTable
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
                TextColumn::make('Peminjam')
                ->searchable()
                ->sortable(),
                TextColumn::make('Lokasi')
                ->searchable()
                ->sortable(),
                TextColumn::make('Tanggal_Pengembalian')
                ->searchable()
                ->sortable(),

                 ImageColumn::make('qr_code')
                ->label('QR Code')
                ->getStateUsing(fn ($record) => asset('storage/' . $record->qr_code))
                ->disk('public')
                ->width(100)
                ->imageHeight(100)
                ->visibility('visible')
                ->square(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
