<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPengembalian extends Model
{
        protected $fillable = [
        'id',
        'Kode_Barang',
        'Nama_Barang',
        'Kategori',
        'Jumlah_Barang',
        'Satuan',
        'Kondisi_Barang',
        'Peminjam',
        'Lokasi',
        'Tanggal_Pengembalian'
    ];
}
