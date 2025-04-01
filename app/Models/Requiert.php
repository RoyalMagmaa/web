<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Requiert extends Pivot
{
    protected $table = 'requiert';

    public $timestamps = false;
}