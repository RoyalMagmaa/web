<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evaluer extends Model
{
    use HasFactory;
    
    protected $table = 'evaluer';

    protected $fillable = ['utilisateur_id', 'entreprise_id', 'note'];

    public $timestamps = false;
}