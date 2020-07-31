<?php

namespace App\Http\Controllers;

use App\Label;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
      $products = \App\Product::where([['stock', '>=', 1], ['is_active', '=', 1]])->take(16)->get();
      return view('index', compact('products'));
    }
}
