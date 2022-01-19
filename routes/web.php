<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [HouseController::class, "index"]);
Route::get("/create", [HouseController::class, "create"]);
Route::post("/create", [HouseController::class, "add"]);
Route::get("/edit/{id}", [HouseController::class, "edit"]);
Route::put("/edit", [HouseController::class, "update"]);
Route::delete("/delete/{id}", [HouseController::class, "delete"]);
