<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\CareerActivity;


class TMController extends Controller
{
    public function index() {
        $employees = Employee::all();

        return view('employee.index', compact ('employees'));
    }

    public function show(Employee $employee) {
        $payslips = [
            ['filename' => '2024-Jan.pdf', 'date' => '28 Januari 2024'],
            ['filename' => '2024-Feb.pdf', 'date' => '28 Februari 2024'],
            ['filename' => '2024-Mar.pdf', 'date' => '28 Maret 2024'],
            ['filename' => '2024-Apr.pdf', 'date' => '28 April 2024'],
            ['filename' => '2024-May.pdf', 'date' => '28 Mei 2024'],
            ['filename' => '2024-Jun.pdf', 'date' => '28 Juni 2024'],
            ['filename' => '2024-Jul.pdf', 'date' => '28 Juli 2024'],
            ['filename' => '2024-Aug.pdf', 'date' => '28 Agustus 2024'],
            ['filename' => '2024-Sep.pdf', 'date' => '28 September 2024'],
            ['filename' => '2024-Oct.pdf', 'date' => '28 Oktober 2024'],
            ['filename' => '2024-Nov.pdf', 'date' => '28 November 2024'],
            ['filename' => '2024-Dec.pdf', 'date' => '28 Desember 2024'],
        ];

        return view('employee.show', compact ('employee', 'payslips'));
    }

    public function edit($id) {
        $employee = Employee::findOrFail($id);
        $career = CareerActivity::where('employee_id', $id)->get();

        return view('employee.edit', compact('employee', 'career'));

    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'nik' => 'required',
            'name'=> 'required', 
            'tanggal_lahir' => 'required', 
            'email' => 'required', 
            'no_ktp' => 'required',
            'jenis_kelamin' => 'required',
            'ttl' => 'required',
            'alamat_ktp' => 'required',
            'no_npwp' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'alamat_domisili' => 'required',
            'no_telepon' => 'required',
            'level_pendidikan' => 'required',
            'jurusan' => 'required',
            'institusi_pendidikan' => 'required',
            'tahun_lulus' => 'required',
        ]);
    
        $employee = Employee::findOrFail($id);
        $employee->update($validated);

        return redirect()->route('employee.show', $employee->id)
                         ->with('success', 'Data berhasil diupdate!');    
    }

    public function downloadPayslip($filename) {
        $file = storage_path('app/payslips/' . $filename);
        if (!file_exists($file)) {
            abort(404, 'File not found.');
        }
        return response()->download($file);
    }
    

    public function getCareerActivities($employee_id) {
        $employee = Employee::with('careerActivities')->findOrFail($employee_id);
        return view('employee.career', compact('employee'));
    }

    public function storeCareerActivity(Request $request, $employee_id) {
        $validated = $request->validate([
            'nama_role' => 'required',
            'unitSub' => 'required',
            'band_posisi' => 'required',
            'regional_direktorat' => 'required',
            'deskripsi' => 'required',
            'statusPJ' => 'required',
            'tanggalKDMP' => 'required|date',
            'tanggalBand' => 'required|date',
            'tanggalTKWT' => 'required|date',
            'tanggal_akhirTKWT' => 'required|date',
            'tanggal_mutasi' => 'required|date',
            'tanggalPJ' => 'required|date',
            'tanggal_lepasPJ' => 'required|date',
            'tanggal_pensiun' => 'required|date',
            'tanggal_akhir_kontrak' => 'required|date',
            'dokumenSK' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'dokumen_nota_dinas' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'dokumen_lainnya' => 'nullable|file|mimes:pdf,jpg,png|max:2048',

        ]);

        if ($request->hasFile('document_sk')) {
            $validated['dokumenSK'] = $request->file('dokumenSK')->store('career_docs');
            $validated['dokumen_nota_dinas'] = $request->file('dokumen_nota_dinas')->store('career_docs');
            $validated['dokumen_lainnya'] = $request->file('dokumen_lainnya')->store('career_docs');

        }

        $validated['employee_id'] = $employee_id;

        CareerActivity::create($validated);

        return back()->with('success', 'Aktivitas Karir berhasil ditambahkan');
    }

    public function updateCareerActivity(Request $request, $id) {
        $career = CareerActivity::findOrFail($id);

        $validated = $request->validate([
            'nama_role' => 'required',
            'unitSub' => 'required',
            'band_posisi' => 'required',
            'regional_direktorat' => 'required',
            'deskripsi' => 'required',
            'statusPJ' => 'required',
            'tanggalKDMP' => 'required|date',
            'tanggalBand' => 'required|date',
            'tanggalTKWT' => 'required|date',
            'tanggal_akhirTKWT' => 'required|date',
            'tanggal_mutasi' => 'required|date',
            'tanggalPJ' => 'required|date',
            'tanggal_lepasPJ' => 'required|date',
            'tanggal_pensiun' => 'required|date',
            'tanggal_akhir_kontrak' => 'required|date',
            'dokumenSK' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'dokumen_nota_dinas' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'dokumen_lainnya' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('document_sk')) {
            $validated['dokumenSK'] = $request->file('dokumenSK')->store('career_docs');
            $validated['dokumen_nota_dinas'] = $request->file('dokumen_nota_dinas')->store('career_docs');
            $validated['dokumen_lainnya'] = $request->file('dokumen_lainnya')->store('career_docs');

        }

        $career->update($validated);

        return back()->with('success', 'Aktivitas Karir berhasil diupdate');
    }

    public function deleteCareerActivity($id) {
        $career = CareerActivity::findOrFail($id);
        $career->delete();

        return back()->with('success', 'Aktivitas Karir berhasil dihapus');
    }

}
