<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataPeminjaman;
use App\Models\DataBarang;

class BorrowController extends Controller
{
    public function __invoke($id)
    {
        return DB::transaction(function () use ($id) {
            $peminjaman = DataPeminjaman::lockForUpdate()->find($id);

            if (! $peminjaman) {
                return response()->view('scan.notfound', ['message' => 'Peminjaman tidak ditemukan'], 404);
            }

            // jika sudah dieksekusi, jangan jalankan lagi
            if (! empty($peminjaman->is_executed)) {
                return view('scan.already', ['message' => 'Transaksi ini sudah dieksekusi sebelumnya', 'peminjaman' => $peminjaman]);
            }

            // cari barang terkait
            $barang = DataBarang::where('Kode_Barang', $peminjaman->Kode_Barang)->lockForUpdate()->first();

            if (! $barang) {
                return response()->view('scan.notfound', ['message' => 'Barang inventaris tidak ditemukan'], 404);
            }

            $stok = (int) $peminjaman->Jumlah_Barang;

            if ($barang->Jumlah_Barang < $stok) {
                return response()->view('scan.not_enough', [
                    'message' => "Stok tidak mencukupi. Tersisa: {$barang->Jumlah_Barang}",
                    'barang' => $barang
                ], 409);
            }

            // update stok & kondisi
            $barang->Jumlah_Barang -= $stok;

            // jika kondisi pencatatan peminjaman menyertakan kondisi baru, gunakan itu; 
            // di model kamu Kondisi_Barang pada peminjaman mungkin merepresentasikan kondisi saat dipinjam
            if (! empty($peminjaman->Kondisi_Barang)) {
                $barang->Kondisi_Barang = $peminjaman->Kondisi_Barang;
            }

            $barang->save();

            // tandai peminjaman sudah dieksekusi
            $peminjaman->is_executed = true;
            $peminjaman->Tanggal_Peminjaman = $peminjaman->Tanggal_Peminjaman ?? now();
            $peminjaman->save();

            return view('hasil-peminjaman', ['message' => 'Barang berhasil dipinjam', 'barang' => $barang, 'peminjaman' => $peminjaman]);
        });
    }
}
