<?php

namespace App\Http\Controllers;

use App\Category;
use App\Label;
use App\Product;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
      $products = \App\Product::where([['stock', '>=', 1], ['is_active', '=', 1]])->take(16)->get();
      return view('index', compact('products'));
    }

    public function search(Request $r)
    {
      $query = $r->input('search');
      if($query == null) {
        flash("Je hebt niks ingevuld om te zoeken")->error();
        return redirect()->back();
      }
      $categories = Category::where('name', 'like', "%$query%")->get();
      $products = Product::where('title', 'like', "%$query%")->get();
      return view('search_results', compact('categories', 'products', 'query'));
    }
}
