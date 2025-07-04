<!DOCTYPE html>
<html>
<head>
  <title>Aplikasi Sistem HCM Yayasan Kesehatan Telkom
</title>
</head>
<body>
  <header>
    <h2>Blog Ayo Ngoding</h2>
    <nav>
      <a href="/home">HOME</a>
    </nav>
  </header>
  <hr/>
  <br/>
  <br/>

  <!-- bagian ini menampung judul halaman blog -->
  <h3> @yield('judul') </h3>

  <!-- bagian ini menampung konten blog -->
  @yield('konten')

  <br/>
  <br/>
  <hr/>
  <footer>
    <p>Copyright &copy; 2019 - 2021 <a href="https://www.ayongoding.com/">www.ayongoding.com</a></p>
  </footer>
</body>
</html>