<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Product;
use App\Label;

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

// Route::group(array('domain' => 'api.localhost.dev'), function()
// {



  Route::get('/products', function () {

      $products = Product::all();

      return response(json_encode($products, JSON_PRETTY_PRINT), 200)
                    ->header('Content-Type', 'application/json');
  });

  Route::get('/products/{id}', function ($id) {

      $products = Product::where(['id' => $id])->get();

      return response(json_encode($products, JSON_PRETTY_PRINT), 200)
                    ->header('Content-Type', 'application/json');
  });

  Route::get('/labels', function () {

      $products = Label::all();

      return response(json_encode($products, JSON_PRETTY_PRINT), 200)
                    ->header('Content-Type', 'application/json');
  });

  Route::get('/labels/{id}', function ($id) {

      $products = Label::where(['id' => $id])->get();

      return response(json_encode($products, JSON_PRETTY_PRINT), 200)
                    ->header('Content-Type', 'application/json');
  });

// });
