<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\OrderCarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderMotorcycleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, "index"])->name("home");

Route::get("/register", [AuthController::class, "register"])->name("auth.register");
Route::post("/register", [AuthController::class, "store"])->name("auth.store");
Route::get("/login", [AuthController::class, "login"])->name("auth.login");
Route::post("/login", [AuthController::class, "authenticate"])->name("auth.authenticate");
Route::post("/logout", [AuthController::class, "logout"])->name("auth.logout");

Route::post("/order/car/create/{car}", [OrderCarController::class, "create"])->name("order.car.create");

Route::post("/order/motorcycle/create/{motorcycle}", [OrderMotorcycleController::class, "create"])->name("order.motorcycle.create");

Route::resource('/cars', CarController::class);

Route::resource('/motorcycles', MotorcycleController::class);





