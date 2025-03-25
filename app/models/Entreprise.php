<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model {

    use HasFactory;
    
    protected $fillable = ['nom', 'description', 'email', 'telephone', 'evaluation'];

    protected $table = 'entreprise';

}