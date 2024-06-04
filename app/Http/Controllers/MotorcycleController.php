<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotorcycleController extends Controller
{
    public function index(){
        $sort = request("sort");
        if($sort != NULL){
            if($sort == "ASC"){
                $motorcycleList = Motorcycle::orderBy("price", "asc");
            }
            else if($sort == "DESC"){
                $motorcycleList = Motorcycle::orderBy("price", "desc");
            }
            else if($sort == "Lat"){
                $motorcycleList = Motorcycle::orderBy("created_at", "desc");
            }
            else if($sort == "Ear"){
                $motorcycleList = Motorcycle::orderBy("created_at", "asc");
            }
        }
        else{
            $motorcycleList = Motorcycle::latest();
        }
        foreach(request()->except("_token", "search", "sort", "engine_capacity", "startDate", "endDate") as $f => $v){
            if($v != NULL){
                $motorcycleList->where("$f", "$v");
            }
        }

        $search = request("search");
        if(request("search") != NULL){
            $motorcycleList->whereAny([
                "model",
                "brand"
            ], "LIKE", "%$search%");
        }
        if(request("engine_capacity") != NULL) {
            $engine = explode("-", request("engine_capacity"));
            $engine = array_map('intval', $engine);
            $motorcycleList->where("engine_capacity", ">=", $engine[0])
                            ->where("engine_capacity", "<=", $engine[1]);
        }

        $startDate = request("startDate");
        $endDate = request("endDate");
        if($startDate != NULL && $endDate != NULL){
            $orders = Order::where("start_date", ">=", $startDate)
                    ->where("end_date", "<=", $endDate)
                    ->pluck("motorcycle_id");
            $motorcycleList->whereNotIn("id", $orders)->get();
        }

        $motorcycleList = $motorcycleList->paginate(10);
        return view("motorcycles.index", compact("motorcycleList"));

    }

    public function create(){
        if(auth()->user()){
            if(auth()->user()->isAdmin){
                return view("motorcycles.create");
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
                    "engine_capacity" => 'required | integer',
                    "image" => "required|image|mimes:jpeg,png,jpg,gif,svg:max:2048",
                    "color" => 'required'
                ]);
                $image = request()->file("image");
                if($image){
                    $imagePath = $image->store("motorcycle", "public");
                    $validatedFields["image"] = $imagePath;
                    Motorcycle::create($validatedFields);
                }
                return(redirect(route("motorcycles.index")));
            }
            return abort(403);
        }
        return redirect(route("auth.login"));
    }

    public function edit(Motorcycle $motorcycle){
        if(auth()->user()){
            if(auth()->user()->isAdmin){
                return view("motorcycles.edit", compact("motorcycle"));
            }
            return abort(403);
        }
        return redirect(route("auth.login"));
    }

    public function update(Motorcycle $motorcycle){
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
                    "engine_capacity" => 'required',
                    "image" => "image|mimes:jpeg,png,jpg,gif,svg:max:2048",
                    "color" => 'required'
                ]);
                $image = request()->file("image");
                if($image){
                    $imagePath = $image->store("motorcycle", "public");
                    $validatedFields["image"] = $imagePath;
                    Storage::disk("public")->delete($motorcycle["image"] ?? "");
                }
                $motorcycle->update($validatedFields);
                return(redirect(route("motorcycles.index")));
            }
            return abort(403);
        }
        return redirect(route("auth.login"));
    }
    public function destroy(Motorcycle $motorcycle){
        if(auth()->user()){
            if(auth()->user()->isAdmin && Motorcycle::where("id", $motorcycle->id)){
                Storage::disk("public")->delete($motorcycle->image ?? "");
                $motorcycle->delete();
                return redirect(route("motorcycles.index"));
            }
            return abort(403);
        }
        return redirect(route("auth.login"));
    }
}
