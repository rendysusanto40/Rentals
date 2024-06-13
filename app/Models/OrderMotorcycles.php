<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMotorcycles extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "start_date",
        "end_date",
        "price",
        "motorcycle_id",
    ];
}
