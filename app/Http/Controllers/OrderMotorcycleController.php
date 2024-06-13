<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use App\Models\OrderMotorcycles;
use Illuminate\Http\Request;

class OrderMotorcycleController extends Controller
{
    public function create(Motorcycle $motorcycle){
        if(!Motorcycle::where('id', $motorcycle->id)->exists()) {
            return back();
        }
        if(OrderMotorcycles::where('user_id', auth()->user()->id)
                ->where("motorcycle_id", $motorcycle->id)
                ->where("start_date",">=", request("startDate"))
                ->where("end_date", "<=", request("endDate"))
                ->first() != null) {
            return redirect(route("motorcycles.index"));
        }
        if(auth()->check()){
            $now = date("Y-m-d");
            $validatedFields = request()->validate( [
                "startDate" => "date|required|after_or_equal:$now",
                "endDate" => "date|required|after:startDate",
                "price" => "integer|required",
            ]);
            OrderMotorcycles::create([
                "user_id" => auth()->user()->id,
                "start_date" => $validatedFields["startDate"],
                "end_date" => $validatedFields["endDate"],
                "price" => $validatedFields["price"],
                "motorcycle_id" => $motorcycle->id,
            ]);
            return redirect(route("home"));
        }
        return redirect(route("auth.login"));
    }
}
