<?php

namespace App\Models;

use App\Models\User;
use App\Models\Membre;
use App\Models\Association;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Membre extends Model
{
    use HasFactory;

    protected $fillable = [
        'association_id',
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

    public function associations()
    {
        return $this->belongsTo(Association::class,'association_id');
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
