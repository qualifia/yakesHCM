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
        return view('employee.edit', compact ('employee'));
    
    }

    public function update(Request $request, $id) {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Data Updated');
    }

    public function downloadPayslip($filename) {
        $file = storage_path('app/payslips/' . $filename);
        if (!file_exists($file)) {
            abort(404, 'File not found.');
        }
        return response()->download($file);
    }
    
    // public function downloadPayslip($id) {
        // $employee = Employee::findOrFail($id);
        // $file = storage_path('app/payslips/'. $employee->payslip_file);
        // return response()->download($file);
    // }
}
