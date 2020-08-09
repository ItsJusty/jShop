<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Image;
use App\Label;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function index($id)
    // {
    //   return view('product', [
    //     'product' => Product::where('id', $id)->first(),
    //     'count' => Cart::count(),
    //     'images' => Image::product($id)[0],
    //     'add' => Cart::add($id)
    //   ]);
    // }

    public function loadProductDetails($id)
    {

      if(!Product::where(['id' => $id])->first()->is_active) {
        return abort(404);
      }

      $product = Product::find($id);
      if(!$product) {
        return "Product niet gevonden";
      }
      else if($product) {
        return view('product-details', compact('product'));
      }
    }

    public function loadOsmProducts()
    {
      $products = Product::get();
      return view('osm.store.products.product_list', compact('products'));
    }

    public function loadEditProduct($id)
    {
      $product = Product::find($id);
      $labels = Label::get();
      return view('osm.store.products.edit_product', compact('product', 'labels'));
    }

    public function updateProduct($id, Request $request)
    {
      $product = Product::where(['id' => $id])->first();
      $product->title = $request->input('title');
      $product->description_short = $request->input('description_short');
      $product->description = $request->input('description');
      $product->ean13 = $request->input('ean13');
      $product->price = $request->input('price');
      $product->stock = $request->input('stock');
      $product->intern_referention = $request->input('intern_referention');
      $product->label_id = $request->input('label');
      $product->save();

      flash('Het product is opgeslagen met de nieuwe aanpassingen')->success();
      return redirect()->back();
    }

    public function loadNewProduct()
    {
      $labels = Label::get();
      return view('osm.store.products.add_product', compact('labels'));
    }

    public function newProduct(Request $request)
    {
      $product = new Product();
      $product->title = $request->input('title');
      $product->description_short = $request->input('description_short');
      $product->description = $request->input('description');
      $product->ean13 = $request->input('ean13');
      $product->price = $request->input('price');
      $product->stock = $request->input('stock');
      $product->tax_id = 1;
      $product->category_id = 1;
      $product->thumbnail = "ABC";
      $product->intern_referention = $request->input('intern_referention');
      $product->label_id = $request->input('label');
      $product->save();

      flash('Het nieuwe product is toegevoegd aan het assortiment')->success();
      return redirect()->back();
    }

    public function toggleStatus(Request $request)
    {
      $id = $request->input('id');
      $product = Product::find($id);
      if($product->is_active) {
        $product->is_active = 0;
        $product->save();
        flash('Status van product <b>' . $product->title . '</b> is uitgeschakeld')->error();
        return redirect()->back();
      } else {
        $product->is_active = 1;
        $product->save();
        flash('Status van product <b>' . $product->title . '</b> is ingeschakeld')->success();
        return redirect()->back();
      }
    }
}
