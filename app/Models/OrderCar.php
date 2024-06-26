<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCar extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "start_date",
        "end_date",
        "price",
        "car_id",
    ];
}
