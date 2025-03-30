<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['nom', 'prenom', 'email', 'role_id', 'statut_id','mdp'];
    protected $hidden = ['mdp'];

    public function getAuthPassword(){
        return $this->mdp; // Laravel utilisera cette méthode pour vérifier le mot de passe
    }

    public function statut(){
        return $this->belongsTo(Statut::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function candidatures(){
        return $this->hasMany(Candidature::class);
    }

    public function wishlist(){
        return $this->belongsToMany(Offre::class, 'wishlist');
    }

    public function evaluations(){
        return $this->hasMany(Evaluer::class);
    }
}