<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    protected $fillable =[
        'departement_id',
        'nom_department',
        'description',
        
    ];
}
