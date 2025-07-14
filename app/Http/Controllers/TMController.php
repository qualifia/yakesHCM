<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class TMController extends Controller
{
    public function index() {
        $employees = Employee::all();
        return view('employee.index', compact ('employees'));
    }

    public function show(Employee $employee) {
        return view('employee.show', compact ('employee'));
    }

    public function edit($id) {
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact ('employee'));
    
    }

    public function update(Request $request, $id) {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Data Updated');
    }

    public function downloadPayslip($id) {
        $employee = Employee::findOrFail($id);
        $file = storage_path('app/payslips/'. $employee->payslip_file);
        return response()->download($file);
    }
}
