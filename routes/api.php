<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CityGroupController;
use App\Http\Controllers\ProductDiscountController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('products', ProductController::class);
Route::resource('campaign', CampaignController::class);
Route::resource('discount', ProductDiscountController::class);
Route::resource('city',CityController::class);
Route::resouce('city_group',CityGroupController::class);
Route::resource('citygroup', CityGroupController::class);