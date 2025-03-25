<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postuler extends Model
{
    public function utilisateur() {
        return $this->belongsTo(Utilisateur::class);
    }

    public function offre() {
        return $this->belongsTo(Offre::class);
    }
    
}
