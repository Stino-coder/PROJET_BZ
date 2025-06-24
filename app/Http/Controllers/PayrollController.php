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
}
