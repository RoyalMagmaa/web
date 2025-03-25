<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model {
    protected $fillable = ['etat_recherche', 'date_debut', 'date_fin', 'utilisateur_id'];

    public function utilisateur() {
        return $this->belongsTo(Utilisateur::class);
    }
}