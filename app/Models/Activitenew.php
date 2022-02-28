<?php

namespace App\Models;

use App\Models\Activite;
use App\Models\Association;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activitenew extends Model 
{
    use HasFactory;

    protected $fillable = [
        'id',
        'activite',
        'libelle',
        'description',
        'association_id',
        'user_id',
        'montant',
        'status',
    ];

    public function activites()
    {
        return $this->belongsTo(Activite::class,'activite');
    }

    public function associations()
    {
        return $this->belongsTo(Association::class,'association_id');
    }

    // use HasFactory;

}
