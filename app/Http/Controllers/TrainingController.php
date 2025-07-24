<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;

class TrainingController extends Controller
{
    // Tampilkan semua data training
    public function index()
    {
        $trainings = Training::all(); // Atau pakai paginate()
        return view('training.index', compact('trainings'));
    }

    // Tampilkan form tambah training
    public function create()
    {
        return view('training.create');
    }

    // Simpan data training baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'organizer' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'duration' => 'required|string',
            'participants' => 'required|integer',
        ]);

        Training::create($request->all());

        return redirect()->route('training.index')->with('success', 'Training berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $training = Training::findOrFail($id);
        return view('training.edit', compact('training'));
    }

    // Update data training
    public function update(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        $training->update($request->all());

        return redirect()->route('training.index')->with('success', 'Training berhasil diperbarui.');
    }

    // Hapus training
    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();

        return redirect()->route('training.index')->with('success', 'Training berhasil dihapus.');
    }
}
