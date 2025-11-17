<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarisQrController;
use App\Http\Controllers\QrViewController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReturnController;

Route::get('/', function () {
    return redirect()->route('filament.admin.auth.login');
});

Route::get('/qr/{type}/{id}', [QrViewController::class, 'show'])->name('qrshow');

Route::get('/pdf/data-barang', [PdfController::class, 'barang'])->name('pdf.barang');
Route::get('/pdf/data-pengadaan', [PdfController::class, 'pengadaan'])->name('pdf.pengadaan');
Route::get('/pdf/data-peminjaman', [PdfController::class, 'peminjaman'])->name('pdf.peminjaman');
Route::get('/pdf/data-pengembalian', [PdfController::class, 'pengembalian'])->name('pdf.pengembalian');
Route::get('/scan/pengadaan/{id}', [InventarisQrController::class, 'storeFromPengadaan'])->name('scan.pengadaan');
Route::get('/scan/peminjaman/{id}', BorrowController::class)->name('scan.peminjaman');
Route::get('/scan/pengembalian/{id}', ReturnController::class)->name('scan.pengembalian');