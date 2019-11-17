<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    protected $fillable = [
        'name',
        'description',
        'sensing',
        'movement',
        'intelligence'
    ];
}
