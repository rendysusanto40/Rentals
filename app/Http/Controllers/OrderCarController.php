<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\OrderCar;
use App\Models\OrderMotorcycles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Colors\Rgb\Channels\Red;

class OrderCarController extends Controller
{
    public function create(Car $car){
        if(!Car::where('id', $car->id)->exists()) {
            return back();
        }
        if(OrderCar::where('user_id', auth()->user()->id)
                ->where("car_id", $car->id)
                ->where("start_date",">=", request("startDate"))
                ->where("end_date", "<=", request("endDate"))
                ->first() != null) {
            return redirect(route("cars.index"));
        }
        if(auth()->check()){
            $now = date("Y-m-d");
            $validatedFields = request()->validate( [
                "startDate" => "date|required|after_or_equal:$now",
                "endDate" => "date|required|after:startDate",
                "price" => "integer|required",
            ]);
            OrderCar::create([
                "user_id" => auth()->user()->id,
                "start_date" => $validatedFields["startDate"],
                "end_date" => $validatedFields["endDate"],
                "price" => $validatedFields["price"],
                "car_id" => $car->id,
            ]);
            return redirect(route("home"));
        }
        return redirect(route("auth.login"));
    }
}
