@extends('layouts.app')

@section('content')

<style>
/* SIDEBAR STYLE */
body {
  margin: 0;
  background-color: #E6E6FA;
}

.navbar {
  position: fixed;
  top: 0;
  left: 300px;
  width: calc(100% - 300px); /* Supaya tidak menabrak sidebar */
  background-color: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px 25px;
  z-index: 1000;
  box-shadow: 0 0 2px var(--grey-color-light);
  height: 80px;
}

.left-info {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.navbar-name {
  font-size: 13px; /* Membuat nama lebih tebal */
  font-family: Poppins, sans-serif;
  color: #080808;
}

.navbar-date {
  font-size: 0.7em; /* Memperkecil ukuran email */
  color: #2F4F4F; /* Mengubah warna email */
}

.sidebar {
  width: 300px;
  background-color: #FFFFFF;
  position: fixed;
  top: 0;
  left: 0;
  padding: 20px;
  height: 100%
}

.sidebar ul {
  font-family: Poppins, sans-serif;
  font-size: 12px;
  padding: 9px;
  list-style-type: none;
  margin: 0;
  width: 250px;
  overflow: auto;
}

.sidebar ul li a {
  font-size: 12px;
  display: block;
  color: #2F4F4F;
  padding: 8px 16px;
  text-decoration: none;
}

.sidebar ul li a.active {
  border-radius: 10px;
  background-color: rgba(38, 130, 255, 0.15);
  color: mediumblue;
  font-weight: bold;
}

ul li a:hover:not(.active) {
  border-radius: 10px;
  background-color: rgba(38, 130, 255, 0.15);
  color: mediumblue;
  font-weight: bold;
}

.main {
  margin-top: 25px;
  margin-bottom: 10px;
  color: #080808;
  font-size: 12px;
  font-weight: bold;
}

.config {
  margin-top: 25px;
  margin-bottom: 10px;
  color: #080808;
  font-size: 12px;
  font-weight: bold;
}

.menu i {
  margin-right: 8px;
}

.sidebar .logo {
  display: flex; /* Mengaktifkan flexbox */
  align-items: center; /* Menyelaraskan elemen secara vertikal */
  gap: 20px;
  margin-bottom: 20px;
  border-bottom: 1px solid #A9A9A9;
  padding: 9px;
}

.sidebar .logo img {
  width: 45px; /* Atur lebar foto */
  height: 45px; /* Atur tinggi foto */
  border-radius: 10%;
}

.logo-info {
  display: flex;
}

.logo-name {
  font-size: 16px; 
  font-weight: bolder;
  font-family: Poppins, sans-serif;
  color: #2F4F4F;
}

.sidebar .profile {
  display: flex; /* Mengaktifkan flexbox */
  align-items: center; /* Menyelaraskan elemen secara vertikal */
  gap: 20px;
  margin-bottom: 10px;
  border-bottom: 1px solid #A9A9A9;
  padding: 9px;
}

.sidebar .profile img {
  width: 45px; /* Atur lebar foto */
  height: 45px; /* Atur tinggi foto */
  border-radius: 10%;
}

.profile-info {
  display: flex;
  flex-direction: column; /* Mengatur nama dan email menjadi kolom */
}

.profile-name {
  font-size: 13px; /* Membuat nama lebih tebal */
  font-family: Poppins, sans-serif;
  color: #080808;
}

.profile-email {
  font-size: 0.7em; /* Memperkecil ukuran email */
  color: #2F4F4F; /* Mengubah warna email */
}

/* TALENT MANAGEMENT STYLES */
#customers {
  font-family: Poppins, sans-serif;  
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: none;
  font-size: 12px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}

#customers th {
  border-bottom: 1px solid #A9A9A9;
  padding-top: 12px;
  padding-bottom: 12px;
  padding-left: 15px;
  padding-right: 12px;
  text-align: left;
  background-color: #E6E6FA;
  color: #080808;
}

#customers td {
  border-bottom: 1px solid #A9A9A9;
  padding: 1px;
  padding-left: 15px;
  padding-right: 12px;
  color: #2F4F4F;
  background-color: white;
}

.horizontal-dots {
    background: none;
    border: none;
    font-size: 30px;
    cursor: pointer;
    color: mediumblue;
    font-weight: bold;
}

.dropdown-action {
    position: relative;
    display: inline-block;
}

.dropdown-action-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 100px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    z-index: 1;
    border: 1px solid #ccc;
    padding: 5px;
}

.dropdown-action:hover .dropdown-action-content {
    display: block;
}

.page-title {
    font-size: 20px;
    margin-bottom: 20px;
    margin-top: 10px;
    font-family: Poppins, sans-serif;
    font-weight: bolder;
}
.first, .sec, .third {
    display: inline-block;
    font-weight: bold;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 12px;
    min-width: 120px;
    text-align: center;
}
.first {
    background-color: rgba(245, 40, 145, 0.1);
    color: deeppink;
}
.sec {
    background-color: rgba(39, 238, 245, 0.15);
    color: mediumturquoise;
}
.third {
    background-color: rgba(38, 130, 255, 0.15);
    color: mediumblue;
}


/* OFFSET UNTUK KONTEN */
.content-area {
    background-color: white;
    padding: 40px;
    padding-top: 40px;
    margin-left: 260px;
    margin-right: 1px;
    border-radius: 20px;
    width: 1100px;
    margin-top: 140px;
    min-height: calc(100vh - 100px); /* Biar tetap tinggi meski tanpa isi */
    position: relative;
}
</style>

<div class="navbar">
    <div class="left-info">
        <div class="navbar-name" >Hello, Satria Hadi!</div>
        <div class="navbar-date">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</div>
    </div>
</div>


<!-- SIDEBAR -->
<div class="sidebar">
  <div class="logo">
    <img src="https://upload.wikimedia.org/wikipedia/commons/f/ff/Solid_blue.svg" alt="logo-picture">
    <div class="logo-info">
      <div class="logo-name">HRIS Yakes</div>
    </div>
  </div>
  <div class="profile">
    <img src="https://cdn0-production-images-kly.akamaized.net/-1pYFvsXgXGWz-U3Ybxqnc_mDfk=/1280x1706/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/5202248/original/037743300_1745894554-ChatGPT_Image_Apr_29__2025__09_26_56_AM.jpg" alt="profile_picture">
    <div class="profile-info">
      <div class="profile-name">Satria Hadi</div>
      <div class="profile-email">879002@mail.com</div>
    </div>
  </div>
  <nav>
    <ul class="menu">
      <h1 class="main">Main Menu</h1>
      <li><a href="#wp"><i class="fas fa-computer"></i>Workforce Performance</a></li>
      <li><a class="active" href="#tlm"><i class="fas fa-users"></i>Talent Management</a></li>
      <li><a href="#rm"><i class="fas fa-user"></i>Recruitment Management</a></li>
      <li><a href="#trm"><i class="fas fa-chart-line"></i>Training Management</a></li>
      <li><a href="#djm"><i class="fas fa-folder"></i>DJM Management</a></li>
      <h2 class="config">Configuration</h2>
      <li><a href="#user"><i class="fas fa-user"></i>User</a></li>
      <li><a href="#role"><i class="fas fa-gear"></i>Role</a></li>
    </ul>
  </nav>
</div>




<!-- KONTEN UTAMA -->
<div class="content-area">
    <h2 class="page-title">Talent Management</h2>

    <table id="customers">
      <tr>
        <th>No</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Nama Posisi</th>
        <th>Email</th>
        <th>Regional/Direktorat</th>
        <th>Nama Posisi</th>
        <th>Actions</th>
      </tr>

      <tr>
        <td>1</td>
        <td>879002</td>
        <td>Satria Hadi</td>
        <td>08 Agustus 1987</td>
        <td>Health Care Staffs</td>
        <td>879002@mail.com</td>
        <td>Health Care</td>
        <td><div class="first">Organik Yakes</div></td>
        <td>
          <div class="dropdown-action">
            <button class="horizontal-dots">&#x22EF;</button>
            <div class="dropdown-action-content">
                <a href="#">Detail</a><br>
                <a href="#">Edit</a><br>
            </div>
          </div>
        </td>
      </tr>

      <tr>
        <td>2</td>
          <td>879002</td>
          <td>Satria Hadi</td>
          <td>08 Agustus 1987</td>
          <td>Health Care Staffs</td>
          <td>879002@mail.com</td>
          <td>Health Care</td>
          <td>
              <div class="sec">TKWT</div>
          </td>
          <td>
            <div class="dropdown-action">
              <button class="horizontal-dots">&#x22EF;</button>
              <div class="dropdown-action-content">
                  <a href="#">Detail</a><br>
                  <a href="#">Edit</a><br>
              </div>
            </div>
          </td>
      </tr>
      <tr>
        <td>3</td>
          <td>879002</td>
          <td>Satria Hadi</td>
          <td>08 Agustus 1987</td>
          <td>Health Care Staffs</td>
          <td>879002@mail.com</td>
          <td>Health Care</td>
          <td>
              <div class="sec">TKWT</div>
          </td>
          <td>
            <div class="dropdown-action">
              <button class="horizontal-dots">&#x22EF;</button>
              <div class="dropdown-action-content">
                  <a href="#">Detail</a><br>
                  <a href="#">Edit</a><br>
              </div>
            </div>
          </td>
      </tr>
      <tr>
        <td>4</td>
          <td>879002</td>
          <td>Satria Hadi</td>
          <td>08 Agustus 1987</td>
          <td>Health Care Staffs</td>
          <td>879002@mail.com</td>
          <td>Health Care</td>
          <td>
              <div class="first">Organik Yakes</div>
          </td>
          <td>
            <div class="dropdown-action">
              <button class="horizontal-dots">&#x22EF;</button>
              <div class="dropdown-action-content">
                  <a href="#">Detail</a><br>
                  <a href="#">Edit</a><br>
              </div>
            </div>
          </td>
      </tr>
      <tr>
        <td>5</td>
          <td>879002</td>
          <td>Satria Hadi</td>
          <td>08 Agustus 1987</td>
          <td>Health Care Staffs</td>
          <td>879002@mail.com</td>
          <td>Health Care</td>
          <td>
              <div class="first">Organik Yakes</div>
          </td>
          <td>
            <div class="dropdown-action">
              <button class="horizontal-dots">&#x22EF;</button>
              <div class="dropdown-action-content">
                  <a href="#">Detail</a><br>
                  <a href="#">Edit</a><br>
              </div>
            </div>
          </td>
      </tr>
      <tr>
        <td>6</td>
          <td>879002</td>
          <td>Satria Hadi</td>
          <td>08 Agustus 1987</td>
          <td>Health Care Staffs</td>
          <td>879002@mail.com</td>
          <td>Health Care</td>
          <td>
              <div class="first">Organik Yakes</div>
          </td>
          <td>
            <div class="dropdown-action">
              <button class="horizontal-dots">&#x22EF;</button>
              <div class="dropdown-action-content">
                  <a href="#">Detail</a><br>
                  <a href="#">Edit</a><br>
              </div>
            </div>
          </td>
      </tr>
      <tr>
        <td>7</td>
          <td>879002</td>
          <td>Satria Hadi</td>
          <td>08 Agustus 1987</td>
          <td>Health Care Staffs</td>
          <td>879002@mail.com</td>
          <td>Health Care</td>
          <td>
              <div class="third">Talent Mobility</div>
          </td>
          <td>
            <div class="dropdown-action">
              <button class="horizontal-dots">&#x22EF;</button>
              <div class="dropdown-action-content">
                  <a href="#">Detail</a><br>
                  <a href="#">Edit</a><br>
              </div>
            </div>
          </td>
      </tr>
      <tr>
        <td>8</td>
          <td>879002</td>
          <td>Satria Hadi</td>
          <td>08 Agustus 1987</td>
          <td>Health Care Staffs</td>
          <td>879002@mail.com</td>
          <td>Health Care</td>
          <td>
              <div class="third">Talent Mobility</div>
          </td>
          <td>
            <div class="dropdown-action">
              <button class="horizontal-dots">&#x22EF;</button>
              <div class="dropdown-action-content">
                  <a href="#">Detail</a><br>
                  <a href="#">Edit</a><br>
              </div>
            </div>
          </td>
      </tr>
    </table>
</div>

@endsection
