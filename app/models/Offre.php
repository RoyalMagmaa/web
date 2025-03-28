<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description', 'salaire', 'date_debut', 'date_fin', 'entreprise_id'];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }

    public function utilisateursWishlist()
    {
        return $this->belongsToMany(Utilisateur::class, 'wishlist');
    }

    public function utilisateursPostulants()
    {
        return $this->hasMany(Candidature::class);
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'requiert');
    }
}