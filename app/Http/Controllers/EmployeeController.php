<?php

namespace App\Http\Controllers;

use App\Models\contrat;
use App\Models\department;
use Illuminate\Http\Request;
use App\Models\employee;
use Exception;

class EmployeeController extends Controller
{
    // vue
    public function employeeView()
    {
        $department = department::all();
        $contrat = contrat::all();
        $employees = employee::with(['department', 'contrat'])->get();
        return view('mes_profiles.admin_employee', compact('department', 'contrat', 'employees'));
    }


    //delete employee
    public function destroy($id)
    {
        $employee = employee::findOrFail($id);
        $employee->delete();

        return redirect()->back()->with('success', 'Employé supprimé avec succès.');
    }
    //create employee
    public function createEmployee(Request $request)
    {
        try {
            $nomPhoto = $request['nom'] . '.' . $request->photo->extension();
            $path = $request->file('photo')->storeAs('photos', $nomPhoto, 'public');
            if ($path) {

                $employeeData = employee::create([

                    'matricule' => $this->generateMatricule(),
                    'nom' => $request['nom'],
                    'postnom' => $request['postnom'],
                    'prenom' => $request['prenom'],
                    'email' => $request['email'],
                    'telephone' => $request['telephone'],
                    'adresse' => $request['adresse'],
                    'banque' => $request['banque'],
                    'numero_compte' => $request['numero_compte'],
                    'nationalite' => $request['nationalite'],
                    'photo' => $nomPhoto,
                    'sexe' => $request['sexe'],
                    'situation_matrimoniale' => $request['situation_matrimoniale'],
                    'date_de_naissance' => $request['date_de_naissance'],
                    'date_embauche' => $request['date_embauche'],
                    'contrat_id' => $request['contrat_id'],
                    'department_id' => $request['department_id'],
                    //'poste_id'=> $request['poste_id'],

                ]);
            }
            if ($employeeData) {
                return redirect('employeeView')->with('success', 'Employee created successfully!');
            } else {
                return redirect('employeeView')->with('fails', 'Failed to create employee');
            }
        } catch (Exception $e) {
            return redirect('employeeView')->with('fails', $e->getMessage());
        }
    }
    //generate matricule
    private function generateMatricule()
    {
        // Exemple : KAMT + 5 chiffres aléatoires
        do {
            $matricule = 'KAMT' . rand(10000, 99999);
        } while (\App\Models\employee::where('matricule', $matricule)->exists());
        return $matricule;
    }
}
