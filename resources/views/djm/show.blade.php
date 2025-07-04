<!DOCTYPE html>
<html>
<head>
    <title>Detail DJM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1>Detail DJM</h1>
    <p><strong>Kode:</strong> {{ $djm->code }}</p>
    <p><strong>Judul:</strong> {{ $djm->title }}</p>
    <p><strong>Deskripsi:</strong> {{ $djm->description }}</p>
    <a href="{{ route('djms.index') }}" class="btn btn-secondary">Kembali</a>
</div>
</body>
</html>