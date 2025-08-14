<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Defensive queries: adapt table/column names to your schema
        try {
            $totalEmployees = DB::table('employees')->count();
        } catch (\Exception $e) {
            $totalEmployees = 0;
        }

        try {
            $activeEmployees = DB::table('employees')->where('status', 'active')->count();
        } catch (\Exception $e) {
            $activeEmployees = 0;
        }

        try {
            // Example: pending approvals or requests table
           $pendingApprovals = DB::table('approvals')->where('status', 'pending')->count();
        } catch (\Exception $e) {
            $pendingApprovals = 0;
        }

        // Example data for charts (replace with real queries if you have time-series data)
        $chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
        $chartData = [12, 19, 3, 5, 2, 3];

        // Recent employees sample — adapt columns to your table
        try {
            $recentEmployees = DB::table('employees')
                ->select('id', 'name', 'email', 'status')
                ->orderBy('created_at', 'desc')
                ->limit(8)
                ->get();
        } catch (\Exception $e) {
            $recentEmployees = collect();
        }

        return view('dashboard', compact(
            'totalEmployees',
            'activeEmployees',
            'pendingApprovals',
            'chartLabels',
            'chartData',
            'recentEmployees'
        ));
    }
}