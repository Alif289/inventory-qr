<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataPengembalian;
use App\Models\DataBarang;

class ReturnController extends Controller
{
    public function __invoke($id)
    {
        return DB::transaction(function () use ($id) {
            $pengembalian = DataPengembalian::lockForUpdate()->find($id);

            if (! $pengembalian) {
                return response()->view('scan.notfound', ['message' => 'Pengembalian tidak ditemukan'], 404);
            }

            if (! empty($pengembalian->is_executed)) {
                return view('scan.already', ['message' => 'Pengembalian ini sudah diproses sebelumnya', 'pengembalian' => $pengembalian]);
            }

            $barang = DataBarang::where('Kode_Barang', $pengembalian->Kode_Barang)->lockForUpdate()->first();

            if (! $barang) {
                return response()->view('scan.notfound', ['message' => 'Barang inventaris tidak ditemukan'], 404);
            }

            $stok = (int) $pengembalian->Jumlah_Barang;

            // update stok & kondisi
            $barang->Jumlah_Barang += $stok;

            if (! empty($pengembalian->Kondisi_Barang)) {
                $barang->Kondisi_Barang = $pengembalian->Kondisi_Barang;
            }

            $barang->save();

            // tandai pengembalian sudah dieksekusi
            $pengembalian->is_executed = true;
            $pengembalian->Tanggal_Pengembalian = $pengembalian->Tanggal_Pengembalian ?? now();
            $pengembalian->save();

            return view('hasil-pengembalian', ['message' => 'Barang berhasil dikembalikan', 'barang' => $barang, 'pengembalian' => $pengembalian]);
        });
    }
}
