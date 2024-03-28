<?php

namespace route;


use app\Core\Route\Route;  
use app\Controllers\PagesControllers;
use app\Controllers\PostController;


Route::get(["/" => [PagesControllers::class, "index"]]);

Route::get(["/post" => [PostController::class, "index"]]);
Route::get(["/post/create" => [PostController::class, "create"]]);
Route::get(["/post/{id}" => [PostController::class, "show"]]);
Route::get(["/post/edit/{id}" => [PostController::class,"edit"]]);
Route::post(["/post/update/{id}" => [PostController::class,"update"]]);
Route::post(["/post/store" => [PostController::class, "store"]]);
Route::post(["/post/delete/{id}"=> [PostController::class,"destroy"]]);


Route::resolved();