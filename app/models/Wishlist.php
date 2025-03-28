<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Pivot
{
    use HasFactory;
    
    protected $table = 'wishlist';

    public $timestamps = false;
}