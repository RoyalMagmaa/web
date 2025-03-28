<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    use HasFactory;

    protected $fillable = ['nom_statut'];

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class);
    }
}