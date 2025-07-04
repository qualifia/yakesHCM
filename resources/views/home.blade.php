<!DOCTYPE html>
<html>
<head>
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