<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = ['competence'];

    public function offres()
    {
        return $this->belongsToMany(Offre::class, 'requiert');
    }
}
