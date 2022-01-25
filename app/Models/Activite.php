<?php

namespace App\Models;

use App\Models\Association;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activite extends Model
{
    protected $fillable = [
        'libelle',
        'association_id'
    ];
    
    use HasFactory;

    public function associations()
    {
        return $this->belongsTo(Association::class,'association_id');
    }
}
