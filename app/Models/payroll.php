<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payroll extends Model
{
    use HasFactory;
    protected $fillable =[
        'net_a_payer',
        'observation',
        'pay_period_id',
        'paye',
        'salaire_brut',
        'total_gains',
        'total_retenues',
        'matricule_id',
    ];
}
