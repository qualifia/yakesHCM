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

.badge-profile, .badge-keluarga {
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
    font-size: 20px;
    margin-bottom: 20px;
    margin-top: 10px;
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

.right-section {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
}

.stat-boxes {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 1px;
}

.export-btn {
  padding: 6px 12px;
  border-radius: 8px;
  border: 1px solid #ccc;
  background-color: #696969;
  color: white;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  gap: 6px;
  font-weight: bold;
  height: 37px;
  width: 90px;
}

.edit-btn {
  padding: 6px 20px;
  border-radius: 8px;
  border: 1px solid #0000CD;
  background-color: #FFFFFF;
  color: mediumblue;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  gap: 6px;
  font-weight: bold;
  height: 35px;
  width: 90px;
}

.export-btn:hover {
  background-color: #2F4F4F;
}

.edit-btn:hover {
  background-color: #f0f0f0;
}

.left-profile {
    margin-top: 10px;
    margin-left: 20px;
    display: flex;
    gap: 3px;
    align-items: left;
    flex-direction: column;
    font-family: Poppins, sans-serif;
    margin-bottom: 10px;
}

.right-profile {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 10px;
    border-left: 3px solid #A9A9A9;
    padding-left: 50px;
    margin-left: 300px;
    text-align: left;
}

.contact-info {
    color: #2F4F4F;
    text-align: right;
    gap: 29px;
}

.profile-employee {
    display: flex;
    align-items: center;
    gap: 8px; 
    font-family: Poppins, sans-serif;
}

.emprof {
    display: flex;
}

.position {
    font-family: Poppins, sans-serif;
    font-size: 13px;
    margin-top: 5px;
}

.directorate {
    font-family: Poppins, sans-serif;
    font-size: 13px;
}

.contact {
    font-family: Poppins, sans-serif;
    font-size: 12px;
    text-align: left;
    line-height: 25px;
    margin-top: 5px;
    margin-bottom: 5px;
}

.email {
    font-family: Poppins, sans-serif;
    font-size: 12px;
    text-align: left;
    line-height: 25px;
    margin-bottom: 5px;
}

.telp {
    font-family: Poppins, sans-serif;
    font-size: 12px;
    text-align: left;
    line-height: 25px;
}

.tab-buttons {
  display: flex;
  border-bottom: 1.5px solid #A9A9A9;
  margin-top: 20px;
  font-family: Poppins, sans-serif;
}

.tab-button {
    padding: 8px 50px;
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
}

.tab-button.active {
  color: #0000CD;
  background-color: #e6e6fa;
  border-radius: 10px 10px 0 0;
  border-bottom: 3px solid #0000CD;
}

.tab-content {
  padding: 20px 0;
  font-family: Poppins, sans-serif;
  color: #444;
  display: flex;
}

.left-content {
    margin-top: 10px;
    margin-left: 20px;
    display: flex;
    gap: 3px;
    align-items: left;
    flex-direction: column;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    width: 60%; 
}

.right-content {
    width: 40%;
    display: flex;
    flex-direction: column;
    gap: 3px;
    margin-left: 0;
    text-align: left;
    padding-top: 15px;
}

.info1 {
    gap: 5px;
    margin-top: 20px;
    font-size: 13px;
}

.info2 {
    font-size: 13px;
    font-weight: bold;
    text-align: left;
}

.content1, .content2, .content6 {
  display: flex;
  width: 100%;
  border-bottom: 1px solid #A9A9A9;
  padding-right: 90px;
  justify-content: space-between;
  gap: 20px;
}

.content3 {
    display: flex;
    width: 100%;
    padding-right: 90px;
    justify-content: space-between;
    gap: 20px;
}

.content-info, .content-info2, .content-info3, .content-info4, .content-info6 {
    font-size: 14px;
    font-weight: bold;
    padding-top: 20px;
}

.left-content2, .left-content3, .left-content6 {
    width: 60%;
    display: flex;
    flex-direction: column;
    gap: 3px;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    padding-top: 15px;
    margin-top: 10px;
    margin-left: 20px;
}

.right-content2, .right-content3, .right-content6 {
    width: 40%;
    display: flex;
    flex-direction: column;
    gap: 3px;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    padding-top: 15px;
    margin-top: 10px;
    margin-left: 20px;
}

.left-content4 {
    margin-top: 10px;
    margin-left: 20px;
    display: flex;
    gap: 3px;
    align-items: left;
    flex-direction: column;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    width: 60%; 
}

.right-content4 {
    width: 40%;
    display: flex;
    flex-direction: column;
    gap: 3px;
    margin-left: 0;
    text-align: left;
    padding-top: 15px;
}

.content4 {
  display: flex;
  width: 100%;
  border-bottom: 1px solid #A9A9A9;
  padding-right: 90px;
  justify-content: space-between;
  gap: 20px;
}

/* TABLE */
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

.left-section {
    font-size: 18px;
    margin-bottom: 20px;
    margin-top: 10px;
    font-family: Poppins, sans-serif;
    font-weight: bolder;
    margin-right: 20px;
    margin-left: 1px;
}

.right-section1 {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  padding-left: 400px;
}

.search-container {
  position: relative;
}

.search-icon {
  position: absolute;
  top: 8px;
  left: 18px;
  color: #888;
}

.search-bar {
  padding: 8px 5px 5px 30px;
  border: none;
  border-radius: 8px;
  width: 300px;
  background-color: #F5F5F5;
  font-size: 12px;
  font-family: Poppins, sans-serif;
  padding-left: 40px;
  padding-top: 7px;
}

.filter-btn {
  padding: 6px 12px;
  border-radius: 8px;
  border: 1px solid #0000CD;
  background-color: #FFFFFF;
  color: mediumblue;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  gap: 6px;
  margin-right: 18px;
  font-weight: bold;
}

.export-btn:hover {
  background-color: #2F4F4F;
}

.filter-btn:hover {
  background-color: #f0f0f0;
}

/* Filter Modal Styles */
.filter-modal {
  display: none;
  position: absolute;
  right: 40px;
  top: 80px;
  background: white;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
  border-radius: 12px;
  padding: 20px;
  width: 400px;
  z-index: 999;
}

.filter-header {
  display: flex;
  justify-content: space-between;
  font-weight: bold;
  margin-bottom: 10px;
  border-bottom: 1px solid #A9A9A9;
  font-family: Poppins, sans-serif;
  color: #2F4F4F;
}

.filter-section {
  margin-bottom: 15px;
  font-family: Poppins, sans-serif;
  color: #2F4F4F;

}

.filter-section label {
  display: block;
  font-size: 12px;
  margin-bottom: 4px;
}

.filter-section .clear-link {
  float: right;
  font-size: 12px;
  color: blue;
  text-decoration: none;
  cursor: pointer;
}

.filter-footer {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
}

.filter-section select {
  font-size: 12px;
  font-family: Poppins, sans-serif;
  border: 1px solid #ccc;
  border-radius: 8px;
  padding: 10px;
  width: 300px;
  color: #2F4F4F;
}

.reset-btn, .apply-btn {
  padding: 6px 12px;
  border-radius: 6px;
  border: none;
  font-weight: bold;
  cursor: pointer;
}

.reset-btn {
  background-color: white;
  border: 1px solid #0000CD;
  font-size: 12px;
  color: mediumblue;
  font-family: Poppins, sans-serif;
}

.apply-btn {
  background-color: #0000CD;
  color: white;
  border: none;
  font-size: 12px;
  font-family: Poppins, sans-serif;
}

.close-btn {
  background: none;
  border: none;
  font-size: 18px;
  cursor: pointer;
  color: #A9A9A9; 
  padding: 0;
  margin: 0;
  line-height: 2;
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
    text-decoration: none;
}

.dropdown-action:hover .dropdown-action-content {
  background-color: white;
  border-radius: 6px;
  color: #000;
  display: block;
}

.status {
  display: inline-block;
  font-weight: bold;
  padding: 4px 12px;
  border-radius: 12px;
  font-size: 12px;
  text-align: center;
  background-color: rgb(124, 252, 0, 0.15); 
  color: LimeGreen;
}

#customers1 {
  font-family: Poppins, sans-serif;  
  border-collapse: collapse;
  width: 100%;
  margin-top: 10px;
}

#customers1 td, #customers1 th {
  border: none;
  font-size: 12px;
}

#customers1 tr:nth-child(even){background-color: #f2f2f2;}
#customers1 tr:hover {background-color: #ddd;}

#customers1 th {
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

#customers1 td {
  border-bottom: 1px solid #A9A9A9;
  padding-top: 12px;
  padding-bottom: 12px;
  padding-left: 15px;
  padding-right: 12px;
  text-align: left;
  background-color: white;
  color: #2F4F4F;
}

.sertifikat-link {
  color: blue;
  text-decoration: underline;
  cursor: pointer;
  font-weight: 500;
}

.ktp-link {
  color: blue;
  text-decoration: underline;
  cursor: pointer;
  font-weight: 500;
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
<div class="content-header-flex">
  <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
    <h2 class="page-title">Employee Profile</h2>
    <div class="right-section">
        <button class="edit-btn"><i class="fas fa-pen"></i>Edit</button>
        <button class="export-btn"><i class="fas fa-upload"></i>Export</button>
    </div>
  </div>

  <div class="emprof">
    <img class="profile-photo" src="https://cdn0-production-images-kly.akamaized.net/-1pYFvsXgXGWz-U3Ybxqnc_mDfk=/1280x1706/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/5202248/original/037743300_1745894554-ChatGPT_Image_Apr_29__2025__09_26_56_AM.jpg" alt="profile_picture">
        <div class="left-profile">
            <div class="profile-employee">
                <h3 class="employee-name">Satria Hadi</h3>
                <span class="badge-status" id="badgeStatus">Organik Yakes</span>
            </div>
            <p class="position">Health Care Staffs • 879002</p>
            <p class="directorate">Directorate Health Care</p>
        </div>
        <div class="right-profile">
            <div class="contact-info">
                <p class="contact">Contacts</p>
                <p class="email">E-mail : 879002@mail.com</p>
                <p class="telp">Nomor Telepon : +62821 8471 0490</p>
            </div>
        </div>
  </div>

      <!-- NAVIGATION BUTTONS -->
  <div class="tab-buttons">
    <button class="tab-button active" onclick="showTab('profile')">Profile</button>
    <button class="tab-button" onclick="showTab('keluarga')">Data Keluarga</button>
    <button class="tab-button" onclick="showTab('pelatihan')">Histori Pelatihan</button>
    <button class="tab-button" onclick="showTab('payroll')">Data Payroll</button>
    <button class="tab-button" onclick="showTab('karir')">Aktivitas Karir</button>
    <button class="tab-button" onclick="showTab('dokumen')">Dokumen</button>

  </div>

    <!-- CONTENT AREA -->
  <div class="tab-content" id="profile">
    <div class="content1" >
        <div class="left-content">
            <h4 class="content-info">Informasi Pribadi</h4>
            <p class="info1">Nomor KTP</p>
            <p class="info2">3274819204900001</p>
            <p class="info1">Jenis Kelamin</p>
            <p class="info2">Laki-Laki</p>
            <p class="info1">Tempat, Tanggal Lahir</p>
            <p class="info2">Blitar, 18 September 1987</p>
            <p class="info1">Alamat Rumah Sesuai KTP</p>
            <p class="info2">Puri 11 Blok Y-00 Jl. Boulevard Residential, RT.004/RW.001, Pd. Pucung, Karang Tengah, Tangerang Selatan, Banten</p>
        </div>
        <div class="right-content">
            <h4 class="content-info"></h4>
            <p class="info1">Nomor NPWP</p>
            <p class="info2">12.345.678.9.-012.000</p>
            <p class="info1">Agama</p>
            <p class="info2">Islam</p>
            <p class="info1">Status Perkawinan</p>
            <p class="info2">Kawin</p>
            <p class="info1">Alamat Domisili</p>
            <p class="info2">Sama dengan Alamat KTP</p>
        </div>
    </div>
    <div class="content2" >
        <div class="left-content2">
            <h4 class="content-info2">Informasi Pekerjaan</h4>
            <p class="info1">Nama Posisi</p>
            <p class="info2">Health Care Staffs</p>
            <p class="info1">Unit/Sub Direktorat</p>
            <p class="info2">Health Care</p>
            <p class="info1">BP Group</p>
            <p class="info2">BP1234</p>
            <p class="info1">DIT</p>
            <p class="info2">DIT123</p>
            <p class="info1">Status PJ</p>
            <p class="info2">Bukan PJ</p>
            <p class="info1">Lokasi Kerja</p>
            <p class="info2">Yakes Jakarta</p>
            <p class="info1">Tanggal Bergabung</p>
            <p class="info2">8 April 2011</p>
            <p class="info1">Kode DJM</p>
            <p class="info2">12345678912</p>
        </div>
        <div class="right-content2">
            <h4 class="content-info2"></h4>
            <p class="info1">Regional/Direktorat</p>
            <p class="info2">Health Care</p>
            <p class="info1">Direct Supervisor</p>
            <p class="info2">OSM Healthcare</p>
            <p class="info1">Posisi Band</p>
            <p class="info2">VII - V</p>
            <p class="info1">Sub-DIT</p>
            <p class="info2">SUB123</p>
            <p class="info1">Status Kepegawaian</p>
            <p class="info2">Organik Yakes</p>
            <p class="info1">Kota</p>
            <p class="info2">Jakarta</p>
            <p class="info1">Masa Kerja</p>
            <p class="info2">14 Tahun 2 Bulan</p>
            <p class="info1">Medis/Non-Medis</p>
            <p class="info2">Non-Medis</p>
        </div>
    </div>
    <div class="content3" >
        <div class="left-content3">
            <h4 class="content-info3">Informasi Pendidikan</h4>
            <p class="info1">Level Pendidikan</p>
            <p class="info2">Bachelor's Degree of Public Health</p>
            <p class="info1">Tahun Lulus</p>
            <p class="info2">2010</p>
        </div>
        <div class="right-content3">
            <h4 class="content-info3"></h4>
            <p class="info1">Institusi Pendidikan</p>
            <p class="info2">Universitas Indonesia</p>
        </div>
    </div>
  </div>

  <div class="tab-content" id="keluarga" style="display: none;">
    <div class="content4" >
        <div class="left-content4">
            <h4 class="content-info4">Informasi Pasangan</h4>
            <p class="info1">Nama Lengkap</p>
            <p class="info2">Arini Paramita</p>
            <p class="info1">NIK</p>
            <p class="info2">32748258800001</p>
            <p class="info1">Status Pernikahan</p>
            <p class="info2">Kawin</p>
            <p class="info1">Pendidikan Terakhir</p>
            <p class="info2">DIV/S1</p>
            <p class="info1">Alamat Rumah Sesuai KTP</p>
            <p class="info2">Puri 11 Blok Y-00 Jl. Boulevard Residential, RT.004/RW.001, Pd. Pucung, Karang Tengah, Tangerang Selatan, Banten</p>
        </div>
        <div class="right-content4">
            <h4 class="content-info4"></h4>
            <p class="info1">Tempat, Tanggal Lahir</p>
            <p class="info2">Palembang, 30 November 1988</p>
            <p class="info1">Agama</p>
            <p class="info2">Islam</p>
            <p class="info1">Pekerjaan Pasangan</p>
            <p class="info2">Pegawai Swasta</p>
            <p class="info1">Nomor Telepon</p>
            <p class="info2">+62872847168092</p>
            <p class="info1">Alamat Domisili</p>
            <p class="info2">Sama dengan Alamat KTP</p>
        </div>
    </div>
    <table id="customers" style="margin-top: 10px;">
      <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Tempat, Tanggal Lahir</th>
        <th>Pendidikan Saat Ini</th>
        <th>Status Anak</th>
        <th>Urutan Anak</th>
        <th>Keterangan</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Rayan Arka</td>
        <td>Laki-Laki</td>
        <td>Jakarta, 18 Agustus 2009</td>
        <td>SD</td>
        <td>Kandung</td>
        <td>Anak ke-1</td>
        <td>Ditanggung</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Aurelia Zahra</td>
        <td>Perempuan</td>
        <td>Jakarta, 2 Juli 2013</td>
        <td>SD</td>
        <td>Kandung</td>
        <td>Anak ke-2</td>
        <td>Ditanggung</td>
      </tr>
    </table>
  </div>

  <div class="tab-content" id="pelatihan" style="display: none;">
    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
      <h2 class="left-section">List History Pelatihan</h2>
      <div class="right-section1">
        <div class="search-container">
          <i class="fas fa-search search-icon"></i>
          <input type="text" placeholder="Search by Name" class="search-bar" />
        </div>
        <button class="filter-btn" onclick="toggleFilter()"><i class="fas fa-sliders"></i> Filters</button>
      </div>
    </div>
    <table id="customers1" style="margin-top: 10px;">
      <tr>
        <th>No</th>
        <th>Nama Training</th>
        <th>Pelaksana</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Akhir</th>
        <th>Status</th>
        <th>Sertifikat</th>
        <th>Actions</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Effective Communication Skills</td>
        <td>Learning Centre</td>
        <td>29 June 2025</td>
        <td>29 June 2025</td>
        <td>
          <div class="status">Selesai</div>
        </td>
        <td><a href="#" class="sertifikat-link">Klik untuk Melihat</a></td>
        <td class="actions-cell">
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

  <div class="tab-content" id="payroll" style="display: none;">
    <h7>Histori Pelatihan</h7>
    <p>Isi data pelatihan ditampilkan di sini.</p>
  </div>

  <div class="tab-content" id="karir" style="display: none;">
    <h7>Histori Pelatihan</h7>
    <p>Isi data pelatihan ditampilkan di sini.</p>
  </div>

  <div class="tab-content" id="dokumen" style="display: none;">
    <div class="content6" >
      <div class="left-content6">
        <h4 class="content-info6">Dokumen Personal</h4>
        <p class="info1">KTP</p>
        <a href="#" class="ktp-link">Klik untuk Melihat</a>
        <p class="info1">NIK</p>
        <p class="info2">32748258800001</p>
        <p class="info1">Status Pernikahan</p>
        <p class="info2">Kawin</p>
        <p class="info1">Pendidikan Terakhir</p>
        <p class="info2">DIV/S1</p>
        <p class="info1">Alamat Rumah Sesuai KTP</p>
        <p class="info2">Puri 11 Blok Y-00 Jl. Boulevard Residential, RT.004/RW.001, Pd. Pucung, Karang Tengah, Tangerang Selatan, Banten</p>
      </div>
      <div class="right-content6">
        <h4 class="content-info6"></h4>
        <p class="info1">Tempat, Tanggal Lahir</p>
        <p class="info2">Palembang, 30 November 1988</p>
        <p class="info1">Agama</p>
        <p class="info2">Islam</p>
        <p class="info1">Pekerjaan Pasangan</p>
        <p class="info2">Pegawai Swasta</p>
        <p class="info1">Nomor Telepon</p>
        <p class="info2">+62872847168092</p>
        <p class="info1">Alamat Domisili</p>
        p class="info2">Sama dengan Alamat KTP</p>
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

  const badge = document.getElementById('badgeStatus');
  if (badge) {
    // Reset class dulu
    badge.className = 'badge-status';

    switch (tabId) {
      case 'profile':
        badge.textContent = 'Organik Yakes';
        badge.classList.add('badge-profile');
        break;
      case 'keluarga':
        badge.textContent = 'Organik Yakes';
        badge.classList.add('badge-keluarga');
        break;
      case 'pelatihan':
        badge.textContent = 'Permanent';
        badge.classList.add('badge-pelatihan');
        break;
      case 'payroll':
        badge.textContent = 'Permanent';
        badge.classList.add('badge-payroll');
        break;
      case 'karir':
        badge.textContent = 'Permanent';
        badge.classList.add('badge-karir');
        break;
      case 'dokumen':
        badge.textContent = 'Permanent';
        badge.classList.add('badge-dokumen');
        break;
      default:
        badge.textContent = 'Organik Yakes';
        badge.classList.add('badge-profile');
    }
  }
}
</script>
