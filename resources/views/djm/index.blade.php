<!DOCTYPE html>
<html>
<head>
    <title>Daftar DJM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Daftar DJM</h1>
    <a href="{{ route('djms.create') }}" class="btn btn-primary mb-3">+ Tambah DJM</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($djms as $djm)
            <tr>
                <td>{{ $djm->code }}</td>
                <td>{{ $djm->title }}</td>
                <td>
                    <a href="{{ route('djms.show', $djm) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('djms.edit', $djm) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('djms.destroy', $djm) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
