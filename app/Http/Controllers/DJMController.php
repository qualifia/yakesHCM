<?php

namespace App\Http\Controllers;

use App\Models\DJM;
use Illuminate\Http\Request;

class DJMController extends Controller
{
    public function index() {
        $d_j_m_s = DJM::all();

        return view('djm.index', compact('d_j_m_s'));
    }

    public function create() {
        return view('djm.create');
    }

    public function store(Request $request) {

        // Validasi (opsional tapi disarankan)
        $request->validate([
            'namaPosisi' => 'required',
            'regionalDirektorat' => 'required',
            'unitSub' => 'required',
            'job' => 'required',
            'posisi' => 'required',
            'atasanLangsung' => 'required',
            'position_specification' => 'required',
            'position_objective' => 'required',
            'responsibilities' => 'required',
            'success_indicators' => 'required',
        ]);

        // Simpan ke database dan ambil objeknya
        $djm = DJM::create([
            'namaPosisi' => $request->namaPosisi,
            'regionalDirektorat' => $request->regionalDirektorat,
            'unitSub' => $request->unitSub,
            'job' => $request->job,
            'posisi' => $request->posisi,
            'atasanLangsung' => $request->atasanLangsung,
            'position_specification' => $request->position_specification,
            'position_objective' => $request->position_objective,
            'responsibilities' => $request->responsibilities,
            'success_indicators' => $request->success_indicators,
        ]);

        // Redirect ke halaman detail (show)
        return redirect()->route('djm.show', $djm->id);
    }

    public function show($id) {
        $djm = DJM::findOrFail($id);
        return view('djm.show', compact('djm'));
    }

    public function edit($id) {
        $djm = DJM::findOrFail($id);
        return view('djm.edit', compact('djm'));
    }

    public function update(Request $request, $id) {
        $djm = DJM::findOrFail($id);

        $djm->update($request->all()); // pastikan field diisi sesuai dengan fillable

        return redirect()->route('djm.index')->with('success', 'Data berhasil diperbarui.');
    
    }

    public function destroy($id) {
        $djm = DJM::findOrFail($id);
        $djm->delete();

        return redirect()->route('djm.index')->with('success', 'Data berhasil dihapus.');
        
    }

    

    public function upload(Request $request) {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv,pdf,docx|max:2048'
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads/djm', $filename, 'public');

        // Simpan ke database (pastikan kamu punya tabel/files model)
        DB::table('djm_files')->insert([
            'filename' => $filename,
            'path' => $path,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'File berhasil diupload.');
    }


}
