<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda HCM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        /* Tambahkan beberapa gaya kustom jika diperlukan */
        .hero-section {
            background-color: #f8f9fa;
            padding: 100px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center page-title"><br>Selamat datang di Sistem HCM</h1>

        <div class="alert alert-info">
            @if(Auth::check())
                <div class="alert alert-info">
                    Anda login sebagai <strong>{{ Auth::user()->role }}</strong> - <strong>{{ Auth::user()->email }}</strong>
                </div>
            @else
                <div class="alert alert-danger">
                    Anda belum login.
                </div>
            @endif

        <a href="{{ route('djms.index') }}" class="btn btn-primary">Lihat Data DJM</a>

        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>
</html>