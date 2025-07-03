<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Aplikasi Sistem HCM Yayasan Kesehatan Telkom</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

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
    <div class="container"><br>
        <div class="col-md-4 col-md-offset-4">
        <h2 class="text-center page-title"><br>Aplikasi Sistem HCM Yayasan Kesehatan Telkom</h2>
            <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('actionlogin') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block custom-btn">Log In</button>
                <hr>
                <p class="text-center">Belum punya akun? <a href="/register">Register</a> sekarang!</p>
            </form>
        </div>
    </div>
</body>
</html>
