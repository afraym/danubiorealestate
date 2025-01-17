<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Property;
use App\Http\Controllers\PropertyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('properties',PropertyController::class);

Route::get('search',[App\Http\Controllers\PropertyController::class, 'search']);