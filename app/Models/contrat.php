<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contrat extends Model
{
    use HasFactory;
    protected $fillable = [
        'contrat_id',
        'date_debut',
        'date_fin',
        'duree',
        'type',
    ];
}
