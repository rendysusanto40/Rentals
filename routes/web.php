<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarTypeController;
use App\Http\Controllers\HomeController;
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

Route::get("/cars", [CarController::class, "index"])->name("cars.index");
Route::get("/cars/create", [CarController::class, "create"])->name("cars.create");
Route::post("/cars/create", [CarController::class, "store"])->name("cars.store");

Route::get("/cars/edit/{car}", [CarController::class, "edit"])->name("cars.edit");
Route::post("/cars/edit/{car}", [CarController::class, "update"])->name("cars.update");

Route::post("/cars/delete/{car}", [CarController::class, "delete"])->name("cars.delete");




