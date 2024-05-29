<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;

    public $fillables = [
        "model",
        'brand',
        'type',
        'production_year',
        'transmission',
        "price",
        'engine_capacity',
        'image',
        'color'
    ];
}
