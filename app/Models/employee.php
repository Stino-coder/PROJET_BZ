<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable =[
        'matricule',
        'nom',
        'postnom',
        'prenom',
        'email',
        'telephone',
        'adresse',
        'banque',
        'numero_compte',
        'nationalite',
        'photo',
        'sexe',
        'statut',
        'situation_matrimoniale',
        'date_de_naissance',
        'date_embauche',
        'contrat_id',
        'department_id',
        'poste_id',
        
    ];

    public function department()
    {
        return $this->belongsTo(\App\Models\department::class, 'department_id', 'departement_id');
    }

    public function contrat()
    {
        return $this->belongsTo(\App\Models\contrat::class, 'contrat_id', 'contrat_id');
    }
}
