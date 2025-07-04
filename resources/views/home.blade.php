<!DOCTYPE html>
<html>
<head>
<<<<<<< HEAD
  <title>Aplikasi Sistem HCM Yayasan Kesehatan Telkom
</title>
</head>
<body>
  <header>
    <h2>Selamat Datang <b>{{ Auth::user()->username }}</b>, Anda Login sebagai <b>{{ Auth::user()->role }}</b>.</h2>
    <nav>
      <a href="/home">HOME</a>
    </nav>
  </header>
  <hr/>
  <br/>
  <br/>
  <hr/>
  <footer>
    <p>Copyright &copy; 2019 - 2021 <a href="https://www.ayongoding.com/">www.ayongoding.com</a></p>
  </footer>
</body>
</html>
=======
    <title>Beranda HCM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Selamat datang di Sistem HCM</h1>

        <div class="alert alert-info">
            Anda login sebagai <strong>{{ Auth::user()->role }}</strong> - <strong>{{ Auth::user()->email }}</strong>
        </div>

        <a href="{{ route('djms.index') }}" class="btn btn-primary">Lihat Data DJM</a>

        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>
</html>
>>>>>>> 90d6453d53ba935e4b22b9be69f9aade873dbdf0
