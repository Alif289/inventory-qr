<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    protected $fillable = [
        'id',
        'Kode_Barang',
        'Nama_Barang',
        'Kategori',
        'Jumlah_Barang',
        'Satuan',
        'Kondisi_Barang',
        'Lokasi',
        'Tanggal_Perubahan'
    ];
}
