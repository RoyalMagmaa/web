<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist';
    protected $fillable = ['utilisateur_id', 'offre_id'];
    public $timestamps = false;

    // Indiquer à Laravel que la clé primaire est composite
    protected $primaryKey = ['utilisateur_id', 'offre_id'];
    public $incrementing = false; // Important car il n'y a pas d'id auto-incrémenté
    protected $keyType = 'string'; // Laravel ne gérera pas automatiquement le typage

    public function offre()
    {
        return $this->belongsTo(Offre::class, 'offre_id');
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
}