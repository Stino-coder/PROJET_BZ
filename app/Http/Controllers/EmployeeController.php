<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employeeView()
    {
        // This method will return the view for managing employees
        return view('mes_profiles.admin_employee');
    }
}
