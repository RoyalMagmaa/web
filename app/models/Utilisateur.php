<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model {
    protected $fillable = ['nom', 'prenom', 'email', 'mdp', 'role'];

    public function etudiant() {
        return $this->hasOne(Etudiant::class);
    }

    public function candidatures() {
        return $this->hasMany(Candidature::class);
    }
    
    public function wishlist() {
        return $this->belongsToMany(Offre::class, 'wishlist');
    }
}