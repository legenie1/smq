<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    use HasFactory;

    protected $fillable = [
        'trimestre',
        'Processus_id',
        'taux_realisation',
        'chiffre',
        'objectif',
        'cumul1',
        'police_renouvele',
        'police_a_renouvele',
        'cumul2',
        'taux_encais1',
        'total_encais1',
        'total_prime1',
        'cumul3',
        'taux_encais2',
        'total_encais2',
        'total_prime2',
        'cumul4',
        'val1',
        'val2',
        'val3',
        'val4',
    ];

}
