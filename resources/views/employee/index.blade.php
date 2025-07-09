@extends('layouts.app')

@section('content')

<style>
/* SIDEBAR STYLE */
body {
  margin: 0;
  background-color: #E6E6FA;
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
  font-family: Tahoma, sans-serif;
  font-size: 12px;
  padding: 20px;
  list-style-type: none;
  margin: 0;
  width: 250px;
  overflow: auto;
}

.sidebar ul li a {
  font-size: 12px;
  display: block;
  color: #000;
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
  color: #888;
  font-size: 12px;
  font-weight: bold;
}

.config {
  margin-top: 25px;
  margin-bottom: 10px;
  color: #888;
  font-size: 12px;
  font-weight: bold;
}

.menu i {
  margin-right: 8px;
}

/* TALENT MANAGEMENT STYLES */
#customers {
  font-family: Tahoma, sans-serif;
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
  color: #2F4F4F;

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
    font-weight: 700;
    margin-bottom: 20px;
    margin-top: 10px;
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
    padding-top: 50px;
    height: 800px;
    min-height: 100vh;
    margin-left: 250px;
    margin-right: 1px;
    border-radius: 20px;
    width: 1100px;

}
</style>

<!-- SIDEBAR -->
<div class="sidebar">
  <ul class="menu">
    <h1 class="main">Main Menu</h1>
    <li><a href="#wp"><i class="fas fa-computer"></i>Workforce Performance</a></li>
    <li><a class="active" href="#tlm"><i class="fas fa-users"></i>Talent Management</a></li>
    <li><a href="#rm"><i class="fas fa-user"></i>Recruitment Management</a></li>
    <li><a href="#trm">Training Management</a></li>
    <li><a href="djm">DJM Management</a></li>
    <h2 class="config">Configuration</h2>
    <li><a href="#user">User</a></li>
    <li><a href="#role">Role</a></li>
  </ul>
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
