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

.dropdown-action-detail {
  font-family: Poppins, sans-serif;
  font-weight: normal;
  font-size: 12px;
  color: #555;
  text-decoration: none;
}

.dropdown-action:hover .dropdown-action-content {
    display: block;
}

.page-title {
    font-size: 16px;
    margin-bottom: 15px;
    margin-top: 30px;
    font-family: Poppins, sans-serif;
    font-weight: bolder;
    margin-right: 20px;
    margin-left: 1px;
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
  margin-bottom: 4px;
  padding: 2px 6px;
}

.breadcrumb-text:hover {
  color: #808080;
}

.divider {
  margin: 30px 0;
  border-top: 3px solid #A9A9A9;
}

.full-width {
  grid-column: span 2;
  gap: 6px; 
  margin-bottom: 10px;
}

.right-section {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  margin-top: 60px;
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
  text-decoration: none;
}

.export-btn:hover {
  background-color: #2F4F4F;
}

.edit-btn:hover {
  background-color: #f0f0f0;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}

.form-grid h4 {
    font-size: 12px;
    color: #777;
    margin-bottom: 10px;
    font-weight: 500;
    font-family: Poppins, sans-serif;
    margin-top: 15px;
}

.form-grid p {
    font-size: 12px;
    font-weight: 600;
    margin: 0;
    color: #000;
}

.divider {
    grid-column: 1 / -1;
    margin: 30px 0;
    border-top: 3px solid #A9A9A9;
    margin-bottom: 10px;
}

.form-group {
  display: flex;
  flex-direction: column;
}

.full-width {
  grid-column: span 2;
  gap: 6px; 
  margin-bottom: 10px;
}

.section-title {
    margin-top: -10px;
    font-size: 12px;
    color: #777;
    margin-bottom: 4px;
    font-weight: 500;
    font-family: Poppins, sans-serif;
}

.section-title ol li {
    font-size: 12px;
    font-weight: 600;
    margin: 0;
    color: #000;
    margin-left: -10px;
    margin-bottom: 5px;
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
      <li><a href="{{ route('employees.index') }}"><i class="fas fa-users"></i>Talent Management</a></li>
      <li><a href="#rm"><i class="fas fa-user"></i>Recruitment Management</a></li>
      <li><a href="{{ route('training.index') }}"><i class="fas fa-chart-line"></i>Training Management</a></li>
      <li><a class="active" href="#djm"><i class="fas fa-folder"></i>DJM Management</a></li>
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
      <!-- Baris 1: Home & Breadcrumb -->
      <div style="display: flex; align-items: center; gap: 6px;">
        <div class="breadcrumb-row">
          <a href="{{ route('home') }}" class="btn-home" style="padding: 0; color: #696969;">
            <i class="fas fa-house"></i>
          </a>
          <i class="fas fa-chevron-right breadcrumb-arrow"></i>
          <a href="{{ route('djm.index') }}" class="breadcrumb-text">DJM Management</a>
          <i class="fas fa-chevron-right breadcrumb-arrow"></i>
          <a href="{{ url()->current() }}" class="breadcrumb-text">Detail</a>
        </div> 
      </div>
      <h2 class="page-title">DJM Detail</h2>
    </div>
    <div class="right-section">
        <a href="{{ route('djm.edit', $djm->id) }}" class="edit-btn"><i class="fas fa-pen"></i>Edit</a>
        <button class="export-btn"><i class="fas fa-upload"></i>Export</button>
    </div>
  </div>
  <div class="form-grid">
    <div class="form-group">
        <h4>Position Name</h4>
        <p>{{ $djm->namaPosisi }}</p>
    </div>
    
    <div class="form-group">
        <h4>Regional / Directorate</h4>
        <p>{{ $djm->regionalDirektorat }}</p>
    </div>

    <div class="form-group">
        <h4>Unit/Sub Directorate</h4>
        <p>{{ $djm->unitSub }}</p>
    </div>

    <div class="form-group">
        <h4>Direct Supervisor</h4>
        <p>{{ $djm->supervisor }}</p>
    </div>

    <div class="form-group">
        <h4>Band Position</h4>
        <p>{{ $djm->posisi }}</p>
    </div>

    <div class="form-group">
        <h4>DJM Code</h4>
        <p>{{ $djm->kodeDJM }}</p>
    </div>

    <hr class="divider">

    <div class="section-title">Position Specification</div>
    <p style="grid-column: 1 / -1; font-family: Poppins, sans-serif;">{!! nl2br(e($djm->position_specification)) !!}</p>

    <hr class="divider">

    <div class="section-title">Position Objective</div>
    <p style="grid-column: 1 / -1; font-family: Poppins, sans-serif;">{!! nl2br(e($djm->position_objective)) !!}</p>

    <hr class="divider">

    <div class="section-title">Responsibilities</div>
    <p style="grid-column: 1 / -1; font-family: Poppins, sans-serif;">{!! nl2br(e($djm->responsibilities)) !!}</p>

    <hr class="divider">

    <div class="section-title">Success Indicators</div>
    <p style="grid-column: 1 / -1; font-family: Poppins, sans-serif;">{!! nl2br(e($djm->success_indicators)) !!}</p>

    <hr class="divider">

    <div class="section-title">
        <h4>Competencies</h4>
        <ol type="1">
            <li><strong>LEADERSHIP</strong>
                <ol type="a">
                    <li><strong>DIGITAL LEADERSHIP</strong> (1)</li>
                    <li><strong>GLOBAL BUSINESS SAVVY</strong> (1)</li>
                    <li><strong>CUSTOMER FOCUS</strong> (1)</li>
                    <li><strong>BUILDING STRATEGIC PARTNERSHIP</strong> (1)</li>
                    <li><strong>STRATEGIC ORIENTATION</strong> (1)</li>
                    <li><strong>DRIVING EXECUTION</strong> (1)</li>
                    <li><strong>DRIVING INNOVATION</strong> (1)</li>
                    <li><strong>DEVELOPING ORGANIZATIONAL CAPABILITIES</strong> (1)</li>
                    <li><strong>LEADING CHANGE</strong> (1)</li>
                    <li><strong>MANAGING DIVERSITY</strong> (1)</li>
                </ol>
            </li>
            <li><strong>PROFESSIONAL</strong>
                <ol type="a">
                    <li><strong>TEST PLANNING</strong> (1)</li>
                    <li><strong>TEST EXECUTION</strong> (1)</li>
                    <li><strong>TECHNICAL AND FUNCTIONAL CAPACITY</strong> (1)</li>
                </ol>
            </li>
        </ol>
    </div> 
  </div>
</div>
@endsection