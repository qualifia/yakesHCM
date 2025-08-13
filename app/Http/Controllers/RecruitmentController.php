<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class RecruitmentController extends Controller
{
    public function index()
    {
        $positions = Position::paginate(10);
        return view('recruitment.index', compact('positions'));
    }

    public function create()
    {
        return view('recruitment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'is_medical' => 'required|boolean',
            'employment_status' => 'nullable|string',
            'directorate' => 'nullable|string',
            'vacancy_count' => 'required|integer',
            'progress' => 'required|integer|min:0|max:5'
        ]);

        Position::create($request->all());
        return redirect()->route('recruitment.index')->with('success', 'Posisi berhasil ditambahkan');
    }

    public function show($id)
    {
        $p = Position::findOrFail($id);
        return view('recruitment.show', compact('p'));
    }

    public function edit($id)
    {
        $p = Position::findOrFail($id);
        return view('recruitment.edit', compact('p'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'is_medical' => 'required|boolean',
            'employment_status' => 'nullable|string',
            'directorate' => 'nullable|string',
            'vacancy_count' => 'required|integer',
            'progress' => 'required|integer|min:0|max:5'
        ]);

        $p = Position::findOrFail($id);
        $p->update($request->all());

        return redirect()->route('recruitment.index')->with('success', 'Posisi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $p = Position::findOrFail($id);
        $p->delete();

        return redirect()->route('recruitment.index')->with('success', 'Posisi berhasil dihapus');
    }
}
