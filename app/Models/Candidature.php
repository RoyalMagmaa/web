<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    protected $fillable = ['date_candid', 'lettre_motiv', 'cv', 'utilisateur_id', 'offre_id'];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }
}