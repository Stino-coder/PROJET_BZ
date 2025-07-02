<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\election;
use App\Models\candidat;
use App\Models\parti;

class CandidatController extends Controller
{
    public function index()
    {
        $election = election::all();
        $parti = parti::all();
        return view('candidat', compact('election', 'parti'));
    }


    //Methode d'enregistrement d'un candidat
    public function store(Request $request)
    {
        // Validate the incoming request
        $candidatData = Validator::make($request->all(), [
            'nomcand' => ["bail", "required", "string"],
            'province' => ["bail", "required", "string"],
            'age' => ["bail", "required", "string"],
            'adresse' => ["bail", "required", "string"], // Corrigé: "date" devrait être "string"
            'document' => ["bail", "nullable", "file"],
            'election_id' => ["bail", "required", "integer"],
            'parti_id' => ["bail", "required", "integer"],
            'photo' => ["bail", "required", "file"],
        ]);

        if ($candidatData->fails()) {
            return response([$candidatData->errors()], 409);
        } else {
            // Generate a unique filename for the logo
            $nomFile = 'Photo_' . $request["nom"];
            $nomPhoto = $nomFile . '_' . time() . '.' . $request->file('photo')->extension(); // Corrected from photo to logo
            $nomDoc = 'Document_' . $request["nom"];
            $nomPhoto = $nomDoc . '_' . time() . '.' . $request->file('document')->extension();

            // Store the logo in the public storage
            $url = $request->file('photo')->storeAs('photos', $nomPhoto, 'public'); // Changed directory to logos
            $url = $request->file('document')->storeAs('photos', $nomDoc, 'public');

            if ($url) {
                // Create a new parti record in the database
                $parti = candidat::create([
                    "nomcand" => $request['nomcand'],
                    "province" => $request['province'],
                    "age" => $request['age'],
                    "adresse" => $request['adresse'],
                    "document" => $request['file'],
                    "election_id" => $request['election_id'],
                    "parti_id" => $request['parti_id'],
                    "photo" => $url, // Save the URL of the stored logo
                ]);

                if ($parti) { // Corrected from $parfait to $parti
                    return redirect('candidat')->with('success', 'CANDIDAT enregistré avec succès');
                } else {
                    return redirect('candidat')->with('fails', "Echec d'enregistrer");
                }
            } else {
                return redirect('candidat')->with('fails', "Echec d'enregistrement");
            }
        }
    }
}
