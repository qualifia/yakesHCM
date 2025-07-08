@extends('layouts.app')

@section('content')
<style>
#customers {
  font-family: Tahoma, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: none;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #E6E6FA;
  color: black;
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
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 20px;
}
.first {
    display: inline-block;
    background-color: rgba(245, 40, 145, 0.1);
    color: deeppink;
    font-weight: bold;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 15px;
    min-width: 120px;
    text-align: center;
}

.sec {
    display: inline-block;
    background-color: rgba(39, 238, 245, 0.15);
    color: mediumturquoise;
    font-weight: bold;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 15px;
    min-width: 120px;
    text-align: center;
}

.third {
    display: inline-block;
    background-color: rgba(38, 130, 255, 0.15);
    color: mediumblue;
    font-weight: bold;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 15px;
    min-width: 120px;
    text-align: center;
}

</style>
<h1 class="page-title"><br>Talent Management</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>NIK</th>
    <th>Nama</th>
    <th>Tanggal Lahir</th>
    <th>Nama Posisi</th>
    <th>Email</th>
    <th>Regional/Direktorat</th>
    <th>Status Karyawan</th>
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
@endsection
