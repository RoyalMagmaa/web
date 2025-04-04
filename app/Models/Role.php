<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['nom_role', 'utilisateur_id'];

    public function utilisateur()
    {
        return $this->hasMany(Utilisateur::class);
    }
}