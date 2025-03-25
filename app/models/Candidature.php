<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model {
    protected $fillable = ['date_candid', 'lettre_motiv', 'cv', 'offre_id', 'utilisateur_id'];

    public function offre() {
        return $this->belongsTo(Offre::class);
    }

    public function utilisateur() {
        return $this->belongsTo(Utilisateur::class);
    }
}
