<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Order;

class CartController extends Controller
{

  public function __construct()
  {
    // $this->middleware('auth');
  }

  public function addToCart(Request $request)
  {

    if(!session('shopping_cart')) session(['shopping_cart' => []]);

    $id = intval($request->input('id'));
    if(!$id) {
      flash('Er is iets fout gegaan')->error();
      return redirect()->back();
    }

    $amount = intval($request->input('order_amount'));
    if(!$amount || $amount <= 0) $amount = 1;

    // if($request->input('amount') <= 0) {
    //   flash('Wij houden alleen van positieve winkelmandjes')->error();
    //   return redirect()->back();
    // }

    $product = Product::where(['id' => $id])->first();

    if(!$product->is_active) {
      flash('Dit product is momenteel uitgeschakeld, neem contact op met onze klantenservice')->important();
      return redirect()->back();
    }

    if($product->stock < $amount) {
      flash('Dit product is niet op voorraad in deze hoeveelheid, het is daarom niet mogelijk om deze te bestellen')->error();
      return redirect()->back();
    }

    if(!is_array(session('shopping_cart'))) {
      session(['shopping_cart' => []]);
    }

    $shoppingCart = session('shopping_cart');

    for($i = key($shoppingCart); $i < sizeof($shoppingCart); $i++) {
      if(session("shopping_cart")[$i]['id'] == $id) {
        if((session('shopping_cart')[$i]['amount'] + $amount) > $product->stock) {
          flash('Het is niet mogelijk om dit aantal te bestellen omdat we niet genoeg voorraad hebben')->error();
          return redirect()->back();
        }
      }
    }

    $oldSession = session('shopping_cart');
    if(!is_array($oldSession)) {
      session(['shopping_cart' => []]);
    }
    $newSession = session('shopping_cart');
    $itemExists = false;
    foreach($newSession as $key => $item) {
      if($item['id'] == $id) {
        $newSession[$key]['amount'] += $amount;
        $itemExists = true;
      }
    }

    if(!$itemExists) {
      array_push($newSession, ['id' => $id, 'amount' => $amount]);
    }
    session(['shopping_cart' => $newSession]);
    flash(__('flashes.product_added_to_cart'))->success();
    return redirect()->back();
  }

  public function removeFromCart($id)
  {
    $products = session('shopping_cart', []);

    foreach ($products as $key => $product) {
      if($product['id'] == $id) {
        unset($products[$key]);
      }
    }

    session()->put('shopping_cart', $products);
    flash(__('flashes.remove_cart_success'))->info();
    return redirect()->action('CartController@loadCart');
  }

  public function loadCart()
  {
    $cartProducts = [];
    if(session('shopping_cart')) {
      foreach (session('shopping_cart') as $cartSessionProduct) {
        array_push($cartProducts, ['product' => \App\Product::find($cartSessionProduct['id']), 'amount' => $cartSessionProduct['amount']]);
      }
    }
    return view('cart', compact('cartProducts'));
  }

  public function amountChange(Request $request)
  {

    if($request->input('amount') <= 0) {
      flash('Wij houden alleen van positieve winkelmandjes')->error();
      return redirect()->back();
    }

    if(!Product::find($request->input('id'))->is_active) {
      flash('Dit product is helaas niet actief. Neem contact op met onze klantenservice')->error();
      return redirect()->back();
    }

    if(Product::where(['id' => $request->input('id')])->first()->stock < $request->input('amount')) {
      flash('Dit product is niet op voorraad in deze hoeveelheid, het is daarom niet mogelijk om deze te bestellen')->error();
      return redirect()->back();
    }

    $id = $request->input('id');
    $amount = $request->input('amount');
    $cart_items = session('shopping_cart');

    foreach ($cart_items as $key => $item) {
      if($item['id'] == $id) {
        $cart_items[$key]['amount'] = $amount;
        $itemExists = true;
      }
    }
    session(['shopping_cart' => $cart_items]);
    flash(__('flashes.changed_amount_success'))->success();
    return redirect()->back();
  }

  public static function size()
  {
    if (!(session('shopping_cart'))) return 0;
    $session = session('shopping_cart');
    $size = 0;
    foreach($session as $key => $item) {
      $i = $key * $item;
      $size += $key;
    }
    return $size;
  }

}

 ?>
