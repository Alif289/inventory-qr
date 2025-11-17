<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Scan QR</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f6f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            width: 350px;
            animation: fadeIn 0.4s ease;
        }
        .icon {
            font-size: 60px;
            color: #4CAF50;
        }
        .message {
            font-size: 18px;
            margin-top: 10px;
            font-weight: 500;
        }
        .details {
            margin-top: 15px;
            font-size: 14px;
            text-align: left;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            background: #4CAF50;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #45a049;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon">✅</div>
        <div class="message">{{ $message }}</div>

        @if(isset($barang))
        <div class="details">
            <p><b>Kode Barang:</b> {{ $barang->Kode_Barang }}</p>
            <p><b>Nama Barang:</b> {{ $barang->Nama_Barang }}</p>
            <p><b>Kategori:</b> {{ $barang->Kategori }}</p>
            <p><b>Jumlah:</b> {{ $barang->Jumlah_Barang }}</p>
            <p><b>Lokasi:</b> {{ $barang->Lokasi }}</p>
        </div>
        @endif

        <a href="{{ url('/') }}" class="btn">← Kembali ke Dashboard</a>
    </div>
</body>
</html>