<?php

namespace App\Http\Controllers;

use App\Models\Car;
use GuzzleHttp\Psr7\Request;
use Intervention\Image\ImageManager as Image;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class CarController extends Controller
{
    public function index(){
        if(request("sort") != NULL){
            $sort = request("sort");
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
        if (request("model") != NULL) {
            $carList->whereRaw(sprintf("model regexp '%s'", request("model")));
        }
        if (request("production_year") != NULL) {
            $carList->where("production_year", request("production_year"));
        }
        if (request("transmission") != NULL) {
            $carList->where("transmission", request("transmission"));
        }
        if (request("type") != NULL) {
            $carList->where("type", request("type"));
        }
        if (request("brand") != NULL) {
            $carList->where("brand", request("brand"));
        }
        if (request("people_capacity") != NULL) {
            $carList->where("people_capacity", request("people_capacity"));
        }
        if (request("engine_type") != NULL) {
            $carList->where("engine_type", request("engine_type"));
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
                    "price" => "required",
                    'people_capacity' => 'required',
                    'trunk_capacity' => 'required',
                    "engine_type" => 'required',
                    "image" => "required|image|mimes:jpeg,png,jpg,gif,svg:max:2048",
                    "color" => 'required'
                ]);
                $image = request()->file('image');
                if ($image) {
                    $imagePath = $image->store('car', 'public');
                    $validatedFields['image'] = $imagePath;
                    Car::create($validatedFields);
                }
                return redirect(route("cars.index"));
            }
            return abort(403);
        }
        return redirect(route("auth.login"));
    }

    public function edit(Car $car){
        if(auth()->user()){
            if(auth()->user()->isAdmin){
                return view("cars.edit", compact("car"));
            }
            return abort(403);
        }
        return redirect(route("auth.login"));
    }

    public function update(Car $car){
        if(auth()->user()){
            if(auth()->user()->isAdmin){
                $currentYear = date('Y');
                $validatedFields = request()->validate([
                    "model" => "required| min:2 | max:15",
                    'brand' => "required| min:2 | max:15",
                    'type' => "required| min:2 | max:15",
                    'production_year' => "required | integer | digits:4 | before_or_equal:$currentYear",
                    'transmission' => "required",
                    "price" => "required",
                    'people_capacity' => 'required',
                    'trunk_capacity' => 'required',
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
    public function delete(Car $car){
        if(auth()->user()){
            if(auth()->user()->isAdmin){
                Storage::disk("public")->delete($car->image ?? "");
                $car->delete();
                return redirect(route("cars.index"));
            }
            return abort(403);
        }
        return redirect(route("auth.login"));
    }
}
