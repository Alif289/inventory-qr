<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Models\DataPengadaan;
use App\Models\DataPeminjaman;
use App\Models\DataPengembalian;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function barang()
    {
        $data = DataBarang::all();
        $pdf = Pdf::loadView('data-barang', compact('data'))
                  ->setPaper('a4', 'landscape');

        return $pdf->stream('Data_Barang.pdf');
    }

    public function pengadaan()
    {
        $data = DataPengadaan::all();
        $pdf = Pdf::loadView('data-pengadaan', compact('data'))
                  ->setPaper('a4', 'landscape');

        return $pdf->stream('Data_Pengadaan.pdf');
    }

    public function peminjaman()
    {
        $data = DataPeminjaman::all();
        $pdf = Pdf::loadView('data-peminjaman', compact('data'))
                  ->setPaper('a4', 'landscape');

        return $pdf->stream('Data_Peminjaman.pdf');
    }

    public function pengembalian()
    {
        $data = DataPengembalian::all();
        $pdf = Pdf::loadView('data-pengembalian', compact('data'))
                  ->setPaper('a4', 'landscape');

        return $pdf->stream('Data_Peminjaman.pdf');
    }
}
