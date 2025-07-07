<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function payrollView()
    {
        // This method will return the view for managing payroll
        return view('mes_profiles.admin_payroll');
    }
    public function adminPayrollView()
    {
        $employees = \App\Models\employee::with(['department', 'contrat'])->get();
        return view('mes_profiles.admin_payroll', compact('employees'));
    }
}
