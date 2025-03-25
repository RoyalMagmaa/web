<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model {
    protected $fillable = ['titre', 'description', 'salaire', 'date_debut', 'date_fin', 'entreprise_id'];

    public function entreprise() {
        return $this->belongsTo(Entreprise::class);
    }
}
