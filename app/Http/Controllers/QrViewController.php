<?php

namespace App\Http\Controllers;

use App\Models\DataPengadaan;
use App\Models\DataPeminjaman;
use App\Models\DataPengembalian;
use Illuminate\Http\Request;

class QrViewController extends Controller
{

    public function show($type, $id)
    {
        $type = strtolower($type);

        switch ($type) {
            case 'pengadaan':
                $data = DataPengadaan::findOrFail($id);
                break;
            case 'peminjaman':
                $data = DataPeminjaman::findOrFail($id);
                break;
            case 'pengembalian':
                $data = DataPengembalian::findOrFail($id);
                break;
            default:
                abort(404, 'Unknown QR type');
        }

        return view('qrshow', [
            'data' => $data,
            'type' => $type,
        ]);
    }
}
