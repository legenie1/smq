<?php

namespace App\Models;

use App\Models\Societe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Societe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'libelle',
        'duree',
        'start',
        'end',
        'status',
        'user_id'
    ];

    public function societes()
    {
        return $this->hasMany(Societe::class);
    }
}
