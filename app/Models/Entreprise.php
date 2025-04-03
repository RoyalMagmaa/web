<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'email', 'telephone'];

    public function offres()
    {
        return $this->hasMany(Offre::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluer::class);
    }
}