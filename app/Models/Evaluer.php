<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evaluer extends Pivot
{
    use HasFactory;
    
    protected $table = 'evaluer';

    protected $fillable = ['note'];

    public $timestamps = false;
}