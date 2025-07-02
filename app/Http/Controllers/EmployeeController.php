<?php

namespace App\Http\Controllers;

use App\Models\contrat;
use App\Models\department;
use Illuminate\Http\Request;
use App\Models\employee;
use Exception;

class EmployeeController extends Controller
{
    public function employeeView()
    {
        $department = department::all();
        $contrat = contrat::all();
        return view('mes_profiles.admin_employee', compact('department', 'contrat'));
    }
    public function createEmployee(Request $request) 
    {
        try {
            //if ($request->hasFile('photo')) {
            //$photoPath = $request->file('photo')->store('photos', 'public');
       // } else {
            //$photoPath = null;
       // }
            
            

            $employeeData = employee::create([
                
                'nom'=> $request['nom'],
                'postnom'=> $request['postnom'],
                'prenom'=> $request['prenom'],
                'email'=> $request['email'],
                'telephone'=> $request['telephone'],
                'adresse'=> $request['adresse'],
                'banque'=> $request['banque'],
                'numero_compte'=> $request['numero_compte'],
                'nationalite'=> $request['nationalite'],
                //'photo'=> $photoPath,
                'sexe'=> $request['sexe'],
                'situation_matrimoniale'=> $request['situation_matrimoniale'],
                'date_de_naissance'=> $request['date_de_naissance'],
                'date_embauche'=> $request['date_embauche'],
                'contrat_id'=> $request['contrat_id'],
                'department_id'=> $request['department_id'],
                //'poste_id'=> $request['poste_id'],
            ]);
            if ($employeeData) {
                return redirect('employeeView')->with('success', 'Employee created successfully!');
            } else {
                return redirect('employeeView')->with('fails', 'Failed to create employee');
            }
        } catch (Exception $e) {
            return redirect('employeeView')->with('fails', $e->getMessage());
        }
    }
}
