<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QR Code Barang</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      darkMode: 'media', // mengikuti dark mode dari sistem
      theme: {
        extend: {},
      },
    }
  </script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 flex flex-col items-center justify-center min-h-screen transition-colors duration-500">
  <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg text-center">
      <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">QR Code Barang</h1>

      @if ($data->qr_code)
          <img src="{{ asset('storage/' . $data->qr_code) }}" alt="QR Code"
               class="w-64 h-64 mx-auto mb-6">
      @else
          <p class="text-gray-500 dark:text-gray-400 mb-6">QR Code belum tersedia.</p>
      @endif

      <p class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">{{ $data->Nama_Barang }}</p>
      <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Kode: {{ $data->Kode_Barang }}</p>

      <a href="{{ \App\Filament\Resources\DataPengadaans\DataPengadaanResource::getUrl('index') }}"
   class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
   ← Back
</a>

  </div>
</body>
</html>
