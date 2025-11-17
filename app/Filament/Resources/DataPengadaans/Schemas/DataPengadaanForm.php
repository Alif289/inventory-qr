<?php

namespace App\Filament\Resources\DataPengadaans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
class DataPengadaanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id'),
                TextInput::make('Kode_Barang'),
                TextInput::make('Nama_Barang'),
                TextInput::make('Kategori'),
                TextInput::make('Jumlah_Barang'),
                TextInput::make('Satuan'),
                TextInput::make('Kondisi_Barang'),
                TextInput::make('Lokasi'),
            ]);
    }
}
