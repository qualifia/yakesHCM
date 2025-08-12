<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class RecruitmentController extends Controller
{
    public function index()
    {
        
        // $positions = Position::paginate(10);  
        // return view('recruitment.index', compact('recruitment'));
    }

    public function show($id)
    {
        $p = Position::findOrFail($id);
        return view('recruitment.show', compact('p'));
    }

    public function create()
    {
        return view('recruitment.create');
    }
}
