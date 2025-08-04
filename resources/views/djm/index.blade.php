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
#djm-table {
  font-family: Poppins, sans-serif;  
  border-collapse: collapse;
  width: 100%;
  margin-top: 10px;
}

#djm-table td, #djm-table th {
  border: none;
  font-size: 12px;
}

#djm-table tr:nth-child(even){background-color: #f2f2f2;}
#djm-table tr:hover {background-color: #ddd;}

#djm-table th {
  border-bottom: 1px solid #A9A9A9;
  padding-top: 12px;
  padding-bottom: 12px;
  padding-left: 15px;
  padding-right: 12px;
  text-align: left;
  background-color: #E6E6FA;
  color: #080808;
}

#djm-table td {
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
    border-radius: 8px;
}

.dropdown-action-detail {
  font-family: Poppins, sans-serif;
  font-weight: normal;
  font-size: 12px;
  color: #555;
  text-decoration: none;
  margin-left: 8px;
}

.dropdown-action-edit {
  font-family: Poppins, sans-serif;
  font-weight: normal;
  font-size: 12px;
  color: #555;
  text-decoration: none;
  margin-left: 8px;
}

.dropdown-action-hapus {
  font-family: Poppins, sans-serif;
  font-weight: bold;
  font-size: 12px;
  color: red;
  text-decoration: none;
  border: none;
  background-color: white;
  margin-left: 8px;
  padding: 0;
  margin-bottom: -10px;
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


.left-section {
  flex: 1;
}

.right-section {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  padding-top: 20px;
}

.stat-boxes {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 1px;
}

/* Toolbar (Search, Export, Filters) */
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
  font-weight: bold;
}

.create-btn {
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

.create-btn:hover {
  background-color: #191970;
}

.dropdown-container {
  position: relative; /* ini penting! agar dropdown posisi relatif terhadap tombol */
  display: inline-block;
}

.dropdown-menu {
  display: none;
  position: absolute;
  top: 100%; /* muncul tepat di bawah tombol */
  right: 0; /* agar rata kanan jika perlu */
  background-color: white;
  border-radius: 12px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  z-index: 1000;
  padding: 5px 10px;
  min-width: 150px;
}

.dropdown-menu a {
  display: block;
  padding: 8px;
  color: #333;
  text-decoration: none;
  font-size: 12px;
  font-family: Poppins, sans-serif;
}

.dropdown-menu a:hover {
  background-color: #f0f0f0;
  border-radius: 8px;
}

.btn-upload {
  display: block;
  padding: 8px;
  color: #333;
  text-decoration: none;
  font-size: 12px;
  font-family: Poppins, sans-serif;
  min-width: 150px;
  text-align: left;
}

.btn-upload:hover {
  background-color: #f0f0f0;
  border-radius: 8px;
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

.stat-boxes {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 1px;
  margin-bottom: 10px;
  justify-content: space-between;
}

.stat-box {
  display: flex;
  align-items: center;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 12px;
  padding: 6px;
  min-width: 220px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
  flex: 1;
  max-width: 240px;
  height: 80px;
}

.double-box {
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 12px;
  padding: 6px;
  min-width: 300px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
  flex: 1;
  max-width: 400px;
  height: 80px;
  display: flex;
  justify-content: space-between;
  gap: 20px;
}

.sub-box {
  display: flex;
  align-items: center;
  gap: 10px;
}

.icon-circle {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  font-size: 12px;
  margin-right: 12px;
}

.purple {
  background-color: #5c47fb;
}

.cyan {
  background-color: #1cc7d0;
}

.pink {
  background-color: #f73ab7;
}

.stat-info {
  display: flex;
  flex-direction: column;
}

.stat-value {
  font-weight: bold;
  font-size: 12px;
  color: #222;
  font-family: Poppins, sans-serif;
}

.stat-label {
  font-size: 12px;
  color: #555;
  font-family: Poppins, sans-serif;
}

/* Modal Wrapper */
#uploadModal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 2000;
}

/* Modal Box */
#uploadModal .modal-content {
  background: white;
  width: 700px;
  height: 350px;
  margin: 100px auto;
  padding: 30px;
  border-radius: 16px;
  text-align: center;
  position: relative;
}

/* Close Button */
#uploadModal .close-button {
  position: absolute;
  top: 15px;
  right: 50px;
  background: none;
  border: none;
  font-size: 20px;
}

/* Form Layout */
#uploadModal form input[type="file"] {
  margin-bottom: 20px;
}

#uploadModal .form-buttons {
  display: flex;
  justify-content: center;
  gap: 20px;
}

#uploadModal .form-buttons button {
  padding: 10px 20px;
}

#uploadModal .form-buttons .cancel {
  border: 1px solid #ccc;
  background: #eee;
}

#uploadModal .form-buttons .submit {
  border: none;
  background: #0000CD;
  color: white;
}

.content7 {
  display: flex;
  width: 100%;
  padding-right: 90px;
  justify-content: space-between;
  gap: 20px;
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
          <a href="{{ url()->current() }}" class="breadcrumb-text">DJM Management</a>
        </div> 
      </div>
      <h2 class="page-title">DJM Management</h2>
    </div>
    <div class="right-section">
      <div class="search-container">
        <i class="fas fa-search search-icon"></i>
        <input type="text" placeholder="Search by Name" class="search-bar" />
      </div>
      <button class="export-btn"><i class="fas fa-upload"></i> Export</button>
      <button class="filter-btn" onclick="toggleFilter()"><i class="fas fa-sliders"></i> Filters</button>
      <div class="dropdown-container">
        <button class="create-btn" onclick="toggleCreate()"><i class="fas fa-plus"></i> Create</button>
        <div class="dropdown-menu" id="dropdownMenu">
          <a href="{{ route('djm.create') }}">Forms</a>
          <a href="#" onclick="openUploadModal()">Upload File</a>
        </div>
      </div>
    </div>
  </div>


  <!-- FILTER MODAL -->
  <div class="filter-modal" id="filterModal">
    <div class="filter-header">
      <span>Filter</span>
      <button class="close-btn" onclick="toggleFilter()">&times;</button>
    </div>
    <div class="filter-section">
      <label>Filter Name</label>
      <a href="#" class="clear-link">Clear</a>
      <select>
        <option>Select one from filter</option>
        <option>Option A</option>
        <option>Option B</option>
      </select>
    </div>
    <div class="filter-section">
      <label>Filter Name</label>
      <a href="#" class="clear-link">Clear</a>
      <select>
        <option>Select one from filter</option>
        <option>Option A</option>
        <option>Option B</option>
      </select>
    </div>
    <div class="filter-footer">
      <button class="reset-btn">Reset</button>
      <button class="apply-btn">Apply</button>
    </div>
  </div>
  
  <table id="djm-table" class="display" style="margin-top: 10px;">
    <tr>
        <th>No</th>
        <th>Kode DJM</th>
        <th>Nama Posisi</th>
        <th>Regional/Direktorat</th>
        <th>Band Posisi</th>
        <th>Actions</th>
    </tr>
    @foreach ($d_j_m_s as $djm)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $djm->kodeDJM }}</td>
        <td>{{ $djm->namaPosisi }}</td>
        <td>{{ $djm->regionalDirektorat }}</td>
        <td>{{ $djm->posisi }}</td>
        <td>
          <div class="dropdown-action">
            <button class="horizontal-dots">&#x22EF;</button>
            <div class="dropdown-action-content">
              <a href="{{ route('djm.show', $djm->id) }}" class="dropdown-action-detail">Detail</a><br>
              <a href="{{ route('djm.edit', $djm->id) }}" class="dropdown-action-edit">Edit</a><br>
              <form action="{{ route('djm.destroy', $djm->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="dropdown-action-hapus">Delete</button>
              </form>
            </div>
          </div>
        </td>
      </tr>
    @endforeach
  </table>

  <!-- Modal Upload File -->
  <div id="uploadModal">
    <div class="modal-content">
      <div class="content1">
        <div class="left-content1">
          <h3>Tambah Data DJM</h3>
        </div>
        <div class="right-content1">
          <button onclick="closeUploadModal()" class="close-button">&times;</button>
        </div>
      </div>
      <form action="{{ route('djm.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <div class="form-buttons">
          <button type="button" class="cancel" onclick="closeUploadModal()">Cancel</button>
          <button type="submit" class="submit">Tambah</button>
        </div>
      </form>
    </div>
  </div>

  
  

</div>
@endsection

<script>
function toggleFilter() {
  const modal = document.getElementById("filterModal");
  modal.style.display = modal.style.display === "block" ? "none" : "block";
}
</script>

<script>
function toggleCreate() {
  const menu = document.getElementById("dropdownMenu");
  menu.style.display = (menu.style.display === "block") ? "none" : "block";
}
</script>

<script>
$(document).ready(function () {
    $('#djm-table').DataTable({
        "pageLength": 10, // jumlah data per halaman
        "lengthMenu": [10, 25, 50, 100],
        "pagingType": "full_numbers", // ini penting agar muncul tombol: << < 1 2 3 > >>
        "language": {
            "lengthMenu": "Show _MENU_ entries of _TOTAL_ entries",
            "zeroRecords": "Data tidak ditemukan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "infoEmpty": "Tidak ada data tersedia",
            "infoFiltered": "(difilter dari total _MAX_ entri)",
            "search": "Search by Name:",
            "paginate": {
                "first": "<<",
                "last": ">>",
                "next": ">",
                "previous": "<"
            }
        }
    });
});
</script>

<script>
  function openUploadModal() {
    document.getElementById("uploadModal").style.display = "block";
  }
  function closeUploadModal() {
    document.getElementById("uploadModal").style.display = "none";
  }
</script>




