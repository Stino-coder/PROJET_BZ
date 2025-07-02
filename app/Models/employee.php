<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable =[
        'nom',
        'postnom',
        'prenom',
        'email',
        'telephone',
        'adresse',
        'banque',
        'numero_compte',
        'nationalite',
        //'photo',
        'sexe',
        'situation_matrimoniale',
        'date_de_naissance',
        'date_embauche',
        //'contrat_id',
        'department_id',
        'poste_id',
        
    ];
}
