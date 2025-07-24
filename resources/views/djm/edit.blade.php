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
    margin-bottom: 20px;
    margin-top: 10px;
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

.form-grid {
  display: grid;
  grid-template-columns: repeat(2, 500px);
  gap: 24px;
}

.form-group {
  display: flex;
  flex-direction: column;
}

label {
  font-size: 14px;
  font-weight: 500;
  margin-bottom: 6px;
}

.form-control {
  padding: 12px;
  font-size: 14px;
  border-radius: 8px;
  border: 1px solid #ccc;
  background-color: white;
}

.form-control-read {
  padding: 12px;
  font-size: 14px;
  border-radius: 8px;
  border: 1px solid #ccc;
  background-color: #eaeaea;
}

.form-control:read-only {
  background-color: white;
}

textarea.form-control {
  resize: vertical;
  min-height: 100px;
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

.left-section {
    font-size: 16px;
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

.right-section2 {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  padding-left: 800px;
  margin-top: 40px;
}

.save-btn {
  padding: 14px 30px;
  border-radius: 8px;
  border: 1px solid;
  background-color: #0000CD;
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
  border: 1px solid #eaeaea;
  background-color: #eaeaea;
  color: #696969;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  gap: 6px;
  margin-right: 18px;
  font-weight: bold;
  font-family: Poppins, sans-serif;
  text-decoration: none;
}

.add-btn {
  padding: 7px 12px;
  border-radius: 8px;
  border: 1px solid;
  background-color: #0000CD;
  color: white;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  gap: 6px;
  margin-right: 18px;
  font-weight: bold;
  font-family: Poppins, sans-serif;
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
  padding-top: 14px;
  padding-bottom: 14px;
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
  padding-bottom: 14px;
  color: #2F4F4F;
  background-color: white;
  padding-top: 14px;

}

.trash-btn {
  border: none;
  background: none;
  padding: 0;
  margin: 0;
  cursor: pointer;
}

.trash-btn i {
  color: red;
  font-size: 18px;
  text-align: center;
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
          <a href="{{ url()->current() }}" class="breadcrumb-text">Edit</a>
        </div> 
      </div>
      <h2 class="page-title">Edit DJM</h2>
    </div>
  </div>

  <form action="{{ route('djms.update', $djm->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-grid">
        <div class="form-group">
            <label>Position Name *</label>
            <input type="text" name="namaPosisi" class="form-control" value="{{ $djm->namaPosisi }}" required>
        </div>
        <div class="form-group">
            <label>Regional / Directorate *</label>
            <select name="regionalDirektorat" class="form-control" value="{{ $djm->regionalDirektorat }}" required>
                <option value="">-- Pilih Regional --</option>
                <option value="Direktorat Layanan Kesehatan">Direktorat Layanan Kesehatan</option>
                <option value="Direktorat Keuangan">Direktorat Keuangan</option>
                <option value="Direktorat SDM & Umum">Direktorat SDM & Umum</option>
                <!-- Tambahkan opsi lainnya -->
            </select>
        </div>
        <div class="form-group">
            <label>Unit / Sub Directorate *</label>
            <select name="unitSub" class="form-control" value="{{ $djm->unitSub }}" required>
                <option value="">-- Pilih Unit/Sub --</option>
                <option value="Digital Healthcare / CEDX">Digital Healthcare / CEDX</option>
                <option value="Health Service Development">Health Service Development</option>
                <option value="Business Planning">Business Planning</option>
            </select>
        </div>
        <div class="form-group">
            <label>Direct Supervisor *</label>
            <select name="supervisor" class="form-control" value="{{ $djm->supervisor }}" required>
                <option value="">-- Pilih Supervisor --</option>
                <option value="OSM Digital Healthcare">OSM Digital Healthcare</option>
                <option value="Manager Keuangan">Manager Keuangan</option>
                <option value="Kepala Divisi IT">Kepala Divisi IT</option>
            </select>
        </div>
        <div class="form-group">
            <label>Band Position *</label>
            <select name="posisi" class="form-control" value="{{ $djm->posisi }}" required>
                <option value="">-- Pilih Band --</option>
                <option value="VII - V">VII - V</option>
                <option value="VIII - VI">VIII - VI</option>
                <option value="IX - VII">IX - VII</option>
                <!-- Tambahkan opsi lainnya -->
            </select>
        </div>
        <div class="form-group">
            <label>DJM Code *</label>
            <input type="text" name="kodeDJM" class="form-control-read" required>
        </div>
    </div>

    <hr class="divider">

    <div class="form-group full-width">
        <label>Position Specification *</label>
        <textarea name="position_specification" class="form-control" rows="4" required></textarea>
    </div>

    <div class="form-group full-width">
        <label>Position Objective *</label>
        <textarea name="position_objective" class="form-control" rows="4" required></textarea>
    </div>

    <div class="form-group full-width">
        <label>Responsibilities and Accountabilities *</label>
        <textarea name="responsibilities" class="form-control" rows="4" required></textarea>
    </div>

    <div class="form-group full-width">
        <label>Success Indicators *</label>
        <textarea name="success_indicators" class="form-control" rows="4" required></textarea>
    </div>
 
    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
        <h2 class="left-section">Competencies</h2>
        <div class="right-section1">
          <button class="add-btn"><i class="fas fa-plus"></i> Add</button>
        </div>
    </div>
    <table id="customers" style="margin-top: 10px;">
          <tr>
              <th>No</th>
              <th>Category</th>
              <th>Competency</th>
              <th>Grade</th>
              <th>Actions</th>
          </tr>
          <tr>
              <td>1</td>
              <td>Leadership</td>
              <td>Digital Leadership</td>
              <td>1</td>
              <td>
                  <div class="action-trash">
                      <button class="trash-btn"><i class="fas fa-trash-can"></i></button>
                  </div>
              </td>
          </tr>
          <tr>
              <td>2</td>
              <td>Leadership</td>
              <td>Digital Leadership</td>
              <td>1</td>
              <td>
                  <div class="action-trash">
                      <button class="trash-btn"><i class="fas fa-trash-can"></i></button>
                  </div>
              </td>
          </tr>
    </table>

    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
        <div class="right-section2">
          <a href="{{ route('djm.show', $djm->id) }}" class="cancel-btn">Cancel</a>
          <button type="submit" class="btn save-btn">Save</button>
        </div>
    </div>
  </form> 
</div>
@endsection