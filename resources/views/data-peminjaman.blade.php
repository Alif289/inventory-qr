<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Daftar Data Peminjaman</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Kondisi</th>
                <th>Peminjam</th>
                <th>Lokasi</th>
                <th>Tanggal Peminjaman</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->Kode_Barang }}</td>
                <td>{{ $item->Nama_Barang }}</td>
                <td>{{ $item->Kategori }}</td>
                <td>{{ $item->Jumlah_Barang }}</td>
                <td>{{ $item->Satuan }}</td>
                <td>{{ $item->Kondisi_Barang }}</td>
                <td>{{ $item->Peminjam }}</td>
                <td>{{ $item->Lokasi }}</td>
                <td>{{ $item->Tanggal_Peminjaman }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
