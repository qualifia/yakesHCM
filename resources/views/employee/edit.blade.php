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
  width: calc(100% - 300px); 
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
  font-size: 13px; 
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

.profile-photo {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
}

.employee-name {
  font-size: 16px;
  margin: 0;
  font-weight: bold;
}

.badge-status {
  background-color: rgba(245, 40, 145, 0.15);
  color: deeppink;
  font-size: 10px;
  border-radius: 8px;
  padding: 2px 8px;
  margin-left: 6px;
  font-family: Poppins, sans-serif;
}

.badge-profile, .badge-keluarga, .badge-cluster {
  background-color: rgba(245, 40, 145, 0.15);
  color: deeppink;
}

.badge-pelatihan, .badge-payroll, .badge-karir, .badge-dokumen {
  background-color: rgb(124, 252, 0, 0.15); 
  color: LimeGreen;
}

.position, .directorate {
  font-size: 14px;
  color: #444;
  margin: 2px 0;
}

.profile-info {
    display: flex;
    flex-direction: column; /* Mengatur nama dan email menjadi kolom */
}

.profile-name {
  font-size: 15px; /* Membuat nama lebih tebal */
  font-family: Poppins, sans-serif;
  color: #080808;
}

.profile-email {
  font-size: 0.7em; /* Memperkecil ukuran email */
  color: #2F4F4F; /* Mengubah warna email */
}


/* OFFSET UNTUK KONTEN */
.page-title {
    font-size: 18px;
    margin-bottom: 10px;
    margin-top: 1px;
    font-family: Poppins, sans-serif;
    font-weight: bolder;
    margin-right: 20px;
    margin-left: 1px;
}
.content-header-flex {
    background-color: white;
    padding: 24px 32px;
    padding-top: 40px;
    margin-left: 260px;
    margin-right: 1px;
    border-radius: 20px;
    margin-top: 100px;
    min-height: unset; /* Biar tetap tinggi meski tanpa isi */
    position: relative;
    display: flex; 
    flex-direction: column;
    justify-content: flex-start; /* Memberi jarak antara konten dan tombol */
    align-items: flex-start; /* Menyelaraskan elemen di bagian atas */
    max-width: 100%;
    width: 1100px; /* Sidebar width + padding */
    box-sizing: border-box;
    flex-wrap: wrap;
}


.divider {
    grid-column: 1 / -1;
    margin: 30px 0;
    border-top: 3px solid #A9A9A9;
    margin-bottom: 10px;
}

.breadcrumb-row {
  padding: 20px 0;
  font-family: Poppins, sans-serif;
  color: #444;
  display: flex;
  align-items: center;
}

.breadcrumb-arrow {
  margin-bottom: 8px;
  padding: 2px 6px;
  color: #696969;
  font-size: 14px;
  gap: 8px;
  margin-left: 8px;
  cursor: pointer;
  margin-top: 4px;
}

.breadcrumb-text {
  font-family: Poppins, sans-serif;
  font-weight: normal;
  font-size: 16px;
  color: #555;
  text-decoration: none;
  margin-bottom: 4px;
  padding: 2px 6px;
  font-weight: bold;
  margin-top: 4px;
}

.btn-home {
    padding: 6px 12px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    gap: 6px;
    width: fit-content;
    margin-bottom: 8px;
    color: #696969;
}

.btn-home:hover {
    color: #808080;
}

.breadcrumb-row {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-top: -10px;
}

.breadcrumb-arrow {
  margin-bottom: 8px;
  padding: 2px 6px;
  color: #696969;
  font-size: 14px;
  gap: 8px;
  margin-left: 8px;
}

.breadcrumb-text {
  font-family: Poppins, sans-serif;
  font-weight: normal;
  font-size: 14px;
  color: #555;
  text-decoration: none;
  margin-bottom: 8px;
  padding: 2px 6px;
}

.breadcrumb-text:hover {
  color: #808080;
}

.tab-buttons {
  display: flex;
  border-bottom: 1.5px solid #A9A9A9;
  margin-top: 20px;
  font-family: Poppins, sans-serif;
  color: #A9A9A9;
}

.tab-button {
    /*
    padding: 10px 68px;  */
    width: 207px;
    height: 35px;
    max-width: 220px;
    border: none;
    background: none;
    font-size: 12px;
    cursor: pointer;
    color: #555;
    border-bottom: 3px solid transparent;
    transition: all 0.2s ease-in-out;
    
}

.tab-button:hover {
  color: #0000CD;
  font-weight: bold;
}

.tab-button.active {
  color: #0000CD;
  background-color: #e6e6fa;
  border-bottom: 3px solid #0000CD;
  font-weight: bold;

}

.tab-content {
  padding: 20px 0;
  font-family: Poppins, sans-serif;
  color: #444;
  display: flex;
}

.content1, .content3, .content5, .content6 {
  display: flex;
  width: 100%;
  justify-content: space-between;
  gap: 20px;
}

.left-content {
    margin-top: 5px;
    display: flex;
    gap: 3px;
    align-items: left;
    flex-direction: column;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    width: 50%; 
}

.left-content1 {
    margin-top: 5px;
    display: flex;
    gap: 3px;
    align-items: left;
    flex-direction: column;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    width: 50%; 
}

.right-content {
    display: flex;
    flex-direction: column;
    gap: 3px;
    padding-top: 20px;
    margin-left: 800px;
}

.right-content1 {
    display: flex;
    flex-direction: column;
    gap: 3px;
    padding-top: 20px;
    margin-left: 800px;
}

.right-content2 {
    padding-top: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
    padding-left: 300px;
}

.right-content3 {
    display: flex;
    flex-direction: column;
    gap: 3px;
    padding-top: 20px;
    margin-left: 820px;
}

.content-info {
    font-size: 14px;
    font-weight: bold;
    padding-top: 20px;
    padding-left: -50px;
}

.form-grid {
  display: grid;
  grid-template-columns: repeat(2, 500px);
  gap: 24px;
  font-family: Poppins, sans-serif;
  font-weight: normal;
  font-size: 14px;
  padding-top: 35px;
}

.form-group {
  display: flex;
  flex-direction: column;
  margin-right: 50px;
}

.form-group1 {
  display: flex;
  flex-direction: column;
  padding-left: 30px;
  margin-right: 30px;

}

.label-group {
  display: flex;
  align-items: center;
  gap: 4px;
}

label {
  font-size: 14px;
  font-weight: normal;
  margin-bottom: 6px;
}

.form-control {
  padding: 12px;
  font-size: 14px;
  border-radius: 8px;
  border: 1px solid #ccc;
  background-color: white;
}

.form-control1 {
  padding: 12px;
  font-size: 14px;
  border-radius: 8px;
  border: 1px solid #ccc;
  background-color: white;
}


.container {
  position: relative; /* Penting untuk posisi konten */
}

.arrowDown-btn {
  background-color: white;
  border: 1px solid #0000CD	;
  padding: 5px 7px;
  cursor: pointer;
  border-radius: 5px;
}

.arrowDown-btn1 {
  background-color: white;
  border: 1px solid #0000CD	;
  padding: 5px 7px;
  cursor: pointer;
  border-radius: 5px;
}

.fa-chevron-down {
  font-size: 16px;
  color: #0000CD;
}

.content2 {
  display: none; /* Konten tersembunyi */
  position: absolute; /* Posisi absolut terhadap kontainer */
  top: 280px; /*  Letakkan di bawah tombol */
  left: 0;
  background-color: white;
  border-radius: 20px;
  padding: 0px 32px;
  max-width: 100%;
  width: 1100px; /* Sidebar width + padding */
  box-sizing: border-box;
  min-height: unset; /* Biar tetap tinggi meski tanpa isi */
  flex-wrap: wrap;
  z-index: 1; /* Pastikan di atas elemen lain */
}


.content4 {
  display: none; /* Konten tersembunyi */
  position: absolute; /* Posisi absolut terhadap kontainer */
  top: 370px; /*  Letakkan di bawah tombol */
  left: 0;
  background-color: white;
  border-radius: 20px;
  padding: 0px 32px;
  max-width: 100%;
  width: 1100px; /* Sidebar width + padding */
  box-sizing: border-box;
  min-height: unset; /* Biar tetap tinggi meski tanpa isi */
  flex-wrap: wrap;
  z-index: 1; /* Pastikan di atas elemen lain */
}


/*  Gaya saat konten ditampilkan */
.content2.show {
  display: block;
}

.content4.show {
  display: block;
}

.add-btn {
  padding: 6px 12px;
  border-radius: 8px;
  border: 1px solid #0000CD;
  background-color: #0000CD;
  color: white;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  gap: 6px;
  font-weight: bold;
  height: 32px;
  width: 90px;
}

.add-btn:hover {
  background-color: #191970;
}

.fa-plus {
  font-size: 12px;
  font-weight: bold;
  font-family: Poppins, sans-serif;
  align-items: center;
}

#customers {
  font-family: Poppins, sans-serif;  
  border-collapse: collapse;
  width: 100%;
  margin-top: 10px;
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
  background-color: rgba(242, 235, 251, 0.8);
  color: #080808;
  font-weight: normal;
}

#customers td {
  border-bottom: 1px solid #A9A9A9;
  padding-top: 12px;
  padding-bottom: 12px;
  padding-left: 15px;
  padding-right: 12px;
  text-align: left;
  background-color: white;
  color: #2F4F4F;
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
    width: 100px;
    height: 60px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    z-index: 1;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin-left: -65px;
    padding: 10px;
    margin-top: -10px;
}

.dropdown-action-content a {
  display: block;
  font-family: Poppins, sans-serif;
  font-weight: normal;
  font-size: 12px;
  color: #555;
  text-decoration: none;
  margin-left: 8px;
  margin-bottom: -13px; /* Atur jarak antar baris */
}

.right-section2 {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  padding-left: 820px;
  margin-top: 40px;
}

.save-btn {
  padding: 14px 30px;
  border-radius: 8px;
  border: 1px solid;
  background-color: rgb(0, 0, 205);
  color: white;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  gap: 6px;
  font-weight: bold;
  font-family: Poppins, sans-serif;
  text-decoration: none;
}

.cancel-btn {
  padding: 14px 30px;
  border-radius: 8px;
  border: 1px solid #D3D3D3;
  background-color: #D3D3D3;
  color: #696969;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  gap: 6px;
  margin-right: 15px;
  font-weight: bold;
  font-family: Poppins, sans-serif;
  text-decoration: none;
}

.save-btn:hover {
  background-color: #00008B;
  color: white;
}

.cancel-btn:hover {
  background-color: #A9A9A9;
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
    <img src="https://d1nxzqpcg2bym0.cloudfront.net/google_play/com.yakes.medrec/a48efce6-1b26-11e7-a318-1938b92725fa/128x128" alt="logo-picture">
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
<div class="content-header-flex">
  <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
    <div style="display: flex; flex-direction: column; gap: 6px;">
      <div style="display: flex; align-items: center; gap: 6px;">
        <div class="breadcrumb-row">
          <a href="{{ route('home') }}" class="btn-home" style="padding: 0; color: #696969;">
            <i class="fas fa-house"></i>
          </a>
          <i class="fas fa-chevron-right breadcrumb-arrow"></i>
          <a href="{{ route('employees.index') }}" class="breadcrumb-text">Talent Management</a>
          <i class="fas fa-chevron-right breadcrumb-arrow"></i>
          <a href="{{ route('employees.show', $employee->id) }}" class="breadcrumb-text">Employee Profile</a>
          <i class="fas fa-chevron-right breadcrumb-arrow"></i>
          <a href="{{ url()->current() }}" class="breadcrumb-text">Edit</a>
        </div> 
      </div>
      <h2 class="page-title">Edit Profile</h2>
  </div>

  
      <!-- NAVIGATION BUTTONS -->
  <div class="tab-buttons">
    <button class="tab-button active" onclick="showTab('profile')">Profile</button>
    <button class="tab-button" onclick="showTab('keluarga')">Data Keluarga</button>
    <button class="tab-button" onclick="showTab('cluster')">Talent Cluster</button>
    <button class="tab-button" onclick="showTab('karir')">Aktivitas Karir</button>
    <button class="tab-button" onclick="showTab('dokumen')">Dokumen</button>

  </div>

  <div class="tab-content" id="profile">
    <div class="content1" >
        <div class="left-content">
            <h4 class="content-info">Informasi Pribadi</h4>
        </div>
        <div class="right-content">
          <div class="container">
            <button class="arrowDown-btn" onclick="toggleContent('myContent', this)">
              <i class="fas fa-chevron-down"></i>
            </button>
          </div>
            <div class="content2" id="myContent">
              <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-grid">
                    <div class="form-group">
                        <div class="label-group">
                          <label>Nama</label>
                        </div>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group1">
                        <div class="label-group">
                          <label>NIK</label>
                        </div>
                        <input type="text" name="nik" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <div class="label-group">
                          <label>E-mail</label>
                        </div>
                        <input type="text" name="email" class="form-control" required>
                    </div>

                    <div class="form-group1">
                        <div class="label-group">
                          <label>Nomor Telepon</label>
                        </div>
                        <input type="text" name="telpon" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <div class="label-group">
                          <label>Nomor KTP</label>
                        </div>
                        <input type="text" name="ktp" class="form-control" required>
                    </div>

                    <div class="form-group1">
                        <div class="label-group">
                          <label>Nomor NPWP</label>
                        </div>
                        <input type="text" name="npwp" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <div class="label-group">
                          <label>Jenis Kelamin</label>
                        </div>
                        <select name="jenisKelamin" class="form-control1" required>
                            <option disabled selected value=""></option>
                            <option value="Laki Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group1">
                        <div class="label-group">
                          <label>Agama</label>
                        </div>
                        <select name="agama" class="form-control1" required>
                            <option disabled selected value=""></option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="label-group">
                          <label>Tempat, Tanggal Lahir</label>
                        </div>
                        <input type="text" name="ttl" class="form-control" required>
                    </div>
                    
                    <div class="form-group1">
                        <div class="label-group">
                          <label>Status Perkawinan</label>
                        </div>
                        <select name="perkawinan" class="form-control1" required>
                            <option disabled selected value=""></option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="label-group">
                          <label>Alamat Rumah Sesuai KTP</label>
                        </div>
                        <input type="text" name="alamatKTP" class="form-control" required>
                    </div>

                    <div class="form-group1">
                        <div class="label-group">
                          <label>Alamat Domisili</label>
                        </div>
                        <input type="text" name="alamatDom" class="form-control" required>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>

    <hr class="divider">

    <div class="content3" >
        <div class="left-content1">
            <h4 class="content-info">Informasi Pendidikan</h4>
        </div>
        <div class="right-content1">
          <div class="container">
            <button class="arrowDown-btn" onclick="toggleContent('myContent1', this)">
              <i class="fas fa-chevron-down"></i>
            </button>
          </div>
            <div class="content4" id="myContent1">
              <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-grid">
                    <div class="form-group">
                        <div class="label-group">
                          <label>Level Pendidikan</label>
                        </div>
                        <select name="levelPendidikan" class="form-control1" required>
                            <option disabled selected value=""></option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                        </select>
                    </div>

                    <div class="form-group1">
                        <div class="label-group">
                          <label>Jurusan</label>
                        </div>
                        <select name="jurusan" class="form-control1" required>
                            <option disabled selected value=""></option>
                            <option value="Public Health">Public Health</option>
                            <option value="blablabla">blablabla</option>
                            <option value="claclacla">claclacla</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="label-group">
                          <label>Institut Pendidikan</label>
                        </div>
                        <select name="pendidikan" class="form-control1" required>
                            <option disabled selected value=""></option>
                            <option value="Universitas Indonesia">Universitas Indonesia</option>
                            <option value="Institut Teknologi Bandung">Institut Teknologi Bandung</option>
                            <option value="Universitas Gajah Mada">Universitas Gajah Mada</option>
                        </select>
                    </div>

                    <div class="form-group1">
                        <div class="label-group">
                          <label>Tahun Lulus</label>
                        </div>
                        <input type="month" name="tahunLulus" class="form-control" /><br><br>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
        <div class="right-section2">
          <a href="{{ route('employees.show', $employee->id) }}" class="cancel-btn">Cancel</a>
          <button type="submit" class="btn save-btn">Save</button>
        </div>
    </div>
  </div>

  <div class="tab-content" id="keluarga" style="display: none;">
    <div class="content5" >
      <div class="left-content">
        <h4 class="content-info">Informasi Pasangan</h4>
      </div>
      <div class="right-content">
        <button class="arrowDown-btn">
          <i class="fas fa-chevron-down"></i>
        </button>
      </div>
    </div>
      <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid">
          <div class="form-group">
            <div class="label-group">
              <label>Nama Lengkap</label>
            </div>
            <input type="text" name="namaPasangan" class="form-control"  required>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Tempat, Tanggal Lahir</label>
            </div>
            <input type="text" name="ttlPasangan" class="form-control"  required>
          </div>

          <div class="form-group">
            <div class="label-group">
              <label>NIK</label>
            </div>
            <input type="text" name="nikPasangan" class="form-control"  required>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Agama</label>
            </div>
            <select name="agamaPasangan" class="form-control1" required>
              <option disabled selected value=""></option>
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
              <option value="Hindu">Hindu</option>
              <option value="Buddha">Buddha</option>
              <option value="Konghucu">Konghucu</option>
            </select>
          </div>

          <div class="form-group">
            <div class="label-group">
              <label>Status Perkawinan</label>
            </div>
            <select name="perkawinanPasangan" class="form-control1" required>
              <option disabled selected value=""></option>
              <option value="Belum Kawin">Belum Kawin</option>
              <option value="Kawin">Kawin</option>
              <option value="Cerai Hidup">Cerai Hidup</option>
              <option value="Cerai Mati">Cerai Mati</option>
            </select>
          </div>
          
          <div class="form-group1">
            <div class="label-group">
              <label>Pekerjaan Pasangan</label>
            </div>
            <select name="pekerjaanPasangan" class="form-control1" required>
              <option disabled selected value=""></option>
              <option value="PNS">PNS</option>
              <option value="Karyawan Swasta">Karyawan Swasta</option>
              <option value="Wiraswasta">Wiraswasta</option>
              <option value="Pekerjaan Lainnya">Pekerjaan Lainnya</option>
            </select>
          </div>

          <div class="form-group">
            <div class="label-group">
              <label>Pendidikan Terakhir</label>
            </div>
            <select name="agamaPasangan" class="form-control1" required>
              <option disabled selected value=""></option>
              <option value="Diploma">Diploma (D1, D2, D3, D4)</option>
              <option value="Sarjana">Sarjana S1</option>
              <option value="Magister">Magister (S2)</option>
              <option value="Doktor">Doktor (S3)</option>
            </select>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Nomor Telepon</label>
            </div>
            <input type="text" name="telponPasangan" class="form-control"  required>
          </div>

          <div class="form-group">
            <div class="label-group">
              <label>Alamat Rumah Sesuai KTP</label>
            </div>
            <input type="text" name="alamatPasangan" class="form-control"  required>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Alamat Sesuai Domisili</label>
            </div>
            <input type="text" name="domisiliPasangan" class="form-control"  required>
          </div>
        </div>
      </form>

      <hr class="divider">

      <div class="content6" >
        <div class="left-content">
          <h4 class="content-info">Informasi Anak</h4>
        </div>
        <div class="right-content2">
          <button class="add-btn" onclick="toggleFilter()"><i class="fas fa-plus"></i>Tambah</button>
          <button class="arrowDown-btn1"><i class="fas fa-chevron-down"></i></button>
        </div>
      </div>
      <table id="customers" style="margin-top: 20px;">
        <tr>
          <th>No</th>
          <th>Nama Lengkap</th>
          <th>Jenis Kelamin</th>
          <th>Tempat, Tanggal Lahir</th>
          <th>Pendidikan Saat Ini</th>
          <th>Status Anak</th>
          <th>Urutan Anak</th>
          <th>Keterangan</th>
          <th>Actions</th>
        </tr>
      </table>    
      
      <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
        <div class="right-section2">
          <a href="{{ route('employees.show', $employee->id) }}" class="cancel-btn">Cancel</a>
          <button type="submit" class="btn save-btn">Save</button>
        </div>
      </div>
  </div>

  <div class="tab-content" id="cluster" style="display: none;">
    <div class="content5" >
        <div class="left-content">
          <h4 class="content-info">Talent Cluster</h4>
        </div>
        <div class="right-content3">
          <button class="add-btn" onclick="toggleFilter()"><i class="fas fa-plus"></i>Tambah</button>
        </div>
    </div>
    <table id="customers" style="margin-top: 20px;">
        <tr>
          <th>No</th>
          <th>Period</th>
          <th>Year</th>
          <th>Cluster</th>
          <th>Actions</th>
        </tr>
      </table>   
      
      <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
        <div class="right-section2">
          <a href="{{ route('employees.show', $employee->id) }}" class="cancel-btn">Cancel</a>
          <button type="submit" class="btn save-btn">Save</button>
        </div>
      </div>
  </div>

  <div class="tab-content" id="karir" style="display: none;">
    <div class="content5" >
      <div class="left-content">
        <h4 class="content-info">Informasi Pasangan</h4>
      </div>
      <div class="right-content">
        <button class="arrowDown-btn">
          <i class="fas fa-chevron-down"></i>
        </button>
      </div>
    </div>
  </div>

  <div class="tab-content" id="dokumen" style="display: none;">
    <div class="content5" >
      <div class="left-content">
        <h4 class="content-info">Informasi Pasangan</h4>
      </div>
      <div class="right-content">
        <button class="arrowDown-btn">
          <i class="fas fa-chevron-down"></i>
        </button>
      </div>
    </div>
  </div>
</div>
@endsection
<script>
function showTab(tabId) {
  // Sembunyikan semua konten
  const tabs = document.querySelectorAll('.tab-content');
  tabs.forEach(tab => tab.style.display = 'none');

  // Hapus kelas aktif dari semua tombol
  const buttons = document.querySelectorAll('.tab-button');
  buttons.forEach(btn => btn.classList.remove('active'));

  // Tampilkan tab yang diklik
  document.getElementById(tabId).style.display = 'block';

  // Tambahkan kelas aktif ke tombol yang diklik
  event.currentTarget.classList.add('active');
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const tabs = document.querySelectorAll('.tab-content');
  const tabButtons = document.querySelectorAll('.tab-button');

  // Sembunyikan semua tab dulu
  tabs.forEach(tab => tab.style.display = 'none');

  // Ambil hash dari URL
  let hash = window.location.hash || '#profile';
  let activeTab = document.querySelector(hash);
  
  if (activeTab) {
    activeTab.style.display = 'block';
  }

  // Optional: jika pakai tombol tab (tab-button class), tandai yang aktif
  tabButtons.forEach(btn => {
    const target = btn.getAttribute('href');
    if (target === hash) {
      btn.classList.add('active');
    } else {
      btn.classList.remove('active');
    }
  });
});
</script>



<script>
  function toggleContent(contentId, btn) {
    const content = document.getElementById(contentId);
    content.classList.toggle("show");

    const icon = btn.querySelector('i');
    icon.classList.toggle('fa-chevron-down');
    icon.classList.toggle('fa-chevron-up');
  }
</script>
