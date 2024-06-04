<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        "model",
        'brand',
        'type',
        'production_year',
        'transmission',
        "price",
        'people_capacity',
        'trunk_capacity',
        'engine_type',
        'image',
        'color'
    ];

}
