<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'approved_at',
        'approved_by',
        'commentaire',
        'date_debut_conger',
        'date_fin_conger',
        'type',
        'motif_conger',
        'justificatif',
        'statut',
        'matricule_id',
    ];
}
