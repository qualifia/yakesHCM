<?php

namespace App\Http\Controllers;

use App\Models\DJM;
use Illuminate\Http\Request;

class DJMController extends Controller
{
    public function index() {
        $djms = DJM::all();
        return view('djm.index', compact('djms'));
    }

    public function create() {
        return view('djm.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // generate kode unik
        $code = 'DJM-' . strtoupper(uniqid());

        DJM::create([
            'code' => $code,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('djms.index')->with('success', 'DJM berhasil ditambahkan');
    }

    public function show(DJM $djm) {
        return view('djm.show', compact('djm'));
    }

    public function edit(DJM $djm) {
        return view('djm.edit', compact('djm'));
    }

    public function update(Request $request, DJM $djm) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $djm->update($request->only('title', 'description'));
        return redirect()->route('djms.index')->with('success', 'DJM berhasil diubah');
    }

    public function destroy(DJM $djm) {
        $djm->delete();
        return redirect()->route('djms.index')->with('success', 'DJM berhasil dihapus');
    }
}
