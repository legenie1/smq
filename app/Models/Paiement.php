<?php

namespace App\Models;

use App\Models\User;
use App\Models\Membre;
use App\Models\Activite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'nom_id',
        'activite_id',
        'montant',
        'status'
    ];

    public function activities()
    {
        return $this->belongsTo(Activite::class,'activite_id');
    }

    public function users()
    {
        return $this->belongsTo(Membre::class,'nom_id');
    }

    public function roles()
    {
        return $this->belongsTo(roleTypeUser::class,'role_name');
    }
}
