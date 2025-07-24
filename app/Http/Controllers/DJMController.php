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
            'supervisor' => 'required',
            'posisi' => 'required',
            'kodeDJM' => 'required',
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
            'supervisor' => $request->supervisor,
            'posisi' => $request->posisi,
            'kodeDJM' => $request->kodeDJM,
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

    
}
