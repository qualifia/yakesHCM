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
     
    <style>
        body, html {
            font-family: 'Poppins', sans-serif;
            font-size: 25px;
            height: 100%;
            margin: 0;
        }

        .center-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .form-box {
            width: 100%;
            max-width: 700px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
            word-wrap: break-word;
        }

        .form-control {
            font-size: 20px;
            height: 60px;        /* Memperbesar tinggi box */
            padding: 15px 20px;  /* Menambah ruang dalam box */
            border-radius: 10px;
        }

        .custom-btn {
            height: 70px;                 /* Tinggi tombol */
            font-size: 22px;              /* Ukuran font */
            display: flex;
            align-items: center;
            justify-content: center;     /* Horizontal center */
            border-radius: 10px;
        }

    </style>
</head>
<body>
    <div class="container-fluid">
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

        <a href="{{ route('home') }}" class="btn btn-primary">Lihat Data DJM</a>

        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>
</html>