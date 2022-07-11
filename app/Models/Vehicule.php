<?php

namespace App\Models;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'immatriculation',
        'image',
        'libelle',
        'modele',
        'numchassis',
        'nummoteur',
        'fabricant',
        'couleur',
        'statut',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }
}
