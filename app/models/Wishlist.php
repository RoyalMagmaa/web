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

    public function offre()
    {
        return $this->belongsTo(Offre::class, 'offre_id');
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
}