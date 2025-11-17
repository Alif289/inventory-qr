<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataPengadaan;
use Illuminate\Http\Request;

class InventarisQrController extends Controller
{
    public function show($id)
    {
        $data = DataPengadaan::findOrFail($id);
        return view('pengadaan.show', compact('data'));
    }


    public function storeFromPengadaan($pengadaanId)
    {
        $pengadaan = DataPengadaan::find($pengadaanId);

        if (! $pengadaan) {
            return response()->view('scan.notfound', ['message' => 'Data pengadaan tidak ditemukan'], 404);
        }

        // normalisasi kode jika diperlukan (tetap simpan apa adanya dari pengadaan)
        $kode = trim($pengadaan->Kode_Barang);
        $kodeUpper = strtoupper($kode);
        if (! str_starts_with($kodeUpper, 'KD')) {
            $kodeNormalized = 'KD' . $kodeUpper;
        } else {
            $kodeNormalized = $kodeUpper;
        }

        // cek apakah sudah ada di data_barang
        if (DataBarang::where('Kode_Barang', $pengadaan->Kode_Barang)
            ->orWhere('Kode_Barang', $kodeNormalized)
            ->exists()) {
            
            return view('hasil-scan', [
                'message' => 'Barang sudah terdaftar di data_barang',
                'barang' => $pengadaan
            ]);
        }

        // buat entri baru di data_barang
        DataBarang::create([
            'Kode_Barang' => $pengadaan->Kode_Barang,
            'Nama_Barang' => $pengadaan->Nama_Barang,
            'Kategori' => $pengadaan->Kategori,
            'Jumlah_Barang' => $pengadaan->Jumlah_Barang,
            'Satuan' => $pengadaan->Satuan,
            'Kondisi_Barang' => $pengadaan->Kondisi_Barang,
            'Lokasi' => $pengadaan->Lokasi,
            'Tanggal_Perubahan' => now(),
        ]);

        return view('hasil-scan', ['message' => 'Barang berhasil ditambahkan ke data_barang','barang' => $pengadaan]);
    }
}
