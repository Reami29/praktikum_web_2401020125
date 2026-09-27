<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP - Pertemuan 2</title>
</head>
<body>
    <h1>Hasil Latihan PHP Dasar</h1>
    
    <p><strong>Nama:</strong> {{ $nama }}</p>
    
    <p><strong>Daftar Nilai:</strong></p>
    <ul>
        @foreach ($nilai as $angka)
            <li>{{ $angka }}</li>
        @endforeach
    </ul>
    
    <p><strong>Rata-rata:</strong> {{ number_format($rataRata, 2) }}</p>
    <p><strong>Status:</strong> {{ $status }}</p>
</body>
</html>