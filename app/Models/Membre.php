<?php

namespace App\Models;

use App\Models\Membre;
use App\Models\Association;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Membre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sex',
        'phone_number',
        'role_name',
        'email_addresse',
        'cni',
        'association_id',
        'status',
        'password'
    ];

    public function associations()
    {
        return $this->belongsTo(Association::class,'association_id');
    }

    public function roles()
    {
        return $this->belongsTo(roleTypeUser::class,'role_name');
    }
}
