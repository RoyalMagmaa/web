<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model {
    protected $fillable = ['nom', 'description', 'email', 'telephone', 'evaluation'];

    public function offres() {
        return $this->hasMany(Offre::class);
    }
}
