<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik', 
        'name', 
        'tanggal_lahir', 
        'nama_posisi', 
        'email', 
        'regional_direktorat', 
        'posisi_karyawan', 
        'payslip_file',
    ];
}
