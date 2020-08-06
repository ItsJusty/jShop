<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function loadAll()
    {
      $categories = Category::orderBy('name')->get();
      return view('categories', compact('categories'));
    }

    public function load($id)
    {
      $category = Category::find($id);
      $products = $category->products;
      return view('category_products', compact('products', 'category'));
    }
}
