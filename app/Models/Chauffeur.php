<?php

namespace App\Models;

use App\Models\User;
use App\Models\Chauffeur;
use App\Models\Societe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chauffeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'societe_id',
        'user_id',
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function societes()
    {
        return $this->belongsTo(Societe::class,'societe_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function roles()
    {
        return $this->belongsTo(roleTypeUser::class,'role_name');
    }
}
