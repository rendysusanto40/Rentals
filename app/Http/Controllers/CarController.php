<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use App\Models\OrderCar;
use App\Models\Transaction;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager as Image;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class CarController extends Controller
{
    public function index(){
        $sort = request("sort");
        if($sort != NULL){
            if ($sort == "Ear"){
                $carList = Car::orderBy("created_at", "asc");
            }
            else if ($sort == "Lat"){
                $carList = Car::orderBy("created_at", "desc");
            }
            else if ($sort == "ASC"){
                $carList = Car::orderBy('price','asc');
            }
            else if ($sort == "DESC"){
                $carList = Car::orderBy('price','desc');
            }
        }
        else{
            $carList = Car::latest();
        }
        foreach(request()->except("sort", "_token", "search", "startDate", "endDate") as $f => $v){
            if($v != NULL){
                $carList->where("$f", $v);
            }
        }
        $search = request("search");
        if(request("search") != NULL){
            $carList->whereAny([
                "model",
                "brand"
            ], "LIKE", "%$search%");
        }

        $startDate = request("startDate");
        $endDate = request("endDate");
        if($startDate && $endDate){
            if ($startDate < $endDate) {
                session()->put("startDate", $startDate);
                session()->put("endDate", $endDate);
                $orders = OrderCar::where('start_date', '>=', $startDate)
                        ->where('end_date', '<=', $endDate)
                        ->distinct()->pluck('car_id');
                $carList->whereNotIn('id', $orders)->get();
            }
        }
        $carList = $carList->paginate(10);
        return view("cars.index", compact("carList"));
    }


    public function create(){
        if(auth()->user()){
            if(auth()->user()->isAdmin){
                return view("cars.create");
            }
            return abort(403);
        }
        return redirect(route("auth.login"));
    }

    public function store(){
        if(auth()->user()){
            if(auth()->user()->isAdmin){
                $currentYear = date('Y');
                $validatedFields = request()->validate([
                    "model" => "required| min:2 | max:15",
                    'brand' => "required| min:2 | max:15",
                    'type' => "required| min:2 | max:15",
                    'production_year' => "required | integer | digits:4 | before_or_equal:$currentYear",
                    'transmission' => "required",
                    "price" => "required|integer",
                    'people_capacity' => 'required',
                    'trunk_capacity' => 'required|integer',
                    "engine_type" => 'required',
                    "image" => "required|image|mimes:jpeg,png,jpg,gif,svg:max:2048",
                    "color" => 'required'
                ]);
                $image = request()->file("image");
                if($image){
                    $imagePath = $image->store("car", "public");
                    $validatedFields["image"] = $imagePath;
                    Car::create($validatedFields);
                }
                return redirect(route("cars.index"));
            }
            return abort(403);
        }
        return redirect(route("auth.login"));
    }

    public function edit(Car $car){
        if (!Car::where("id", $car->id)->exists()) {
            return back();
        }
        if(auth()->user()){
            if(auth()->user()->isAdmin){
                return view("cars.edit", compact("car"));
            }
            return abort(403);
        }
        return redirect(route("auth.login"));
    }

    public function update(Car $car){
        if (!Car::where("id", $car->id)->exists()) {
            return back();
        }
        if(auth()->user()){
            if(auth()->user()->isAdmin){
                $currentYear = date('Y');
                $validatedFields = request()->validate([
                    "model" => "required| min:2 | max:15",
                    'brand' => "required| min:2 | max:15",
                    'type' => "required| min:2 | max:15",
                    'production_year' => "required | integer | digits:4 | before_or_equal:$currentYear",
                    'transmission' => "required",
                    "price" => "required|integer",
                    'people_capacity' => 'required',
                    'trunk_capacity' => 'required|integer',
                    "engine_type" => 'required',
                    "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:5120 ",
                    "color" => 'required'
                ]);
                $image = request()->file('image');
                if ($image) {
                    $imagePath = $image->store('car', 'public');
                    $validatedFields['image'] = $imagePath;
                    Storage::disk("public")->delete($car->image ?? "");
                }
                $car->update($validatedFields);
                return redirect(route("cars.index"));
            }
            return abort(403);
        }
        return redirect(route("auth.login"));
    }
    public function destroy(Car $car){
        if (!Car::where("id", $car->id)->exists()) {
            return back();
        }
        if(auth()->user()){
            if(auth()->user()->isAdmin && Car::where("id", $car->id)){
                Storage::disk("public")->delete($car->image ?? "");
                $car->delete();
                return redirect(route("cars.index"));
            }
            return abort(403);
        }
        return redirect(route("auth.login"));
    }
    public function show(Car $car){
        if (session("startDate") === null || session("endDate") === null) {
            return back();
        }
        if (session("startDate") >= session("endDate")) {
            return back();
        }

        if (!auth()->check()) {
            return redirect(route("auth.login"));
        }
        if (!Car::where("id", $car->id)->exists()) {
            return back();
        }

        // Display the car's details
        return view("cars.show", ["car" => $car]);
    }

}
