<?php

namespace App\Models;

use App\Models\Membre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Association extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'session',
        'start',
        'end',
        'status',
        'user_id'
    ];

    public function members()
    {
        return $this->hasMany(Membre::class);
    }
}
