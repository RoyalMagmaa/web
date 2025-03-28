<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'email', 'mdp', 'role', 'statut_id'];

    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }

    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }

    public function wishlist()
    {
        return $this->belongsToMany(Offre::class, 'wishlist');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluer::class);
    }
}