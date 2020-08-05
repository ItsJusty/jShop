<?php

namespace App\Http\Controllers;

use App\Address;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function loadOrder()
    {

      foreach (session('shopping_cart') as $product) {
        if($product['amount'] > Product::where(['id' => $product['id']])->first()->stock) {
          flash(__("Het product <b>" . Product::where(['id' => $product['id']])->first()->title . "</b> is niet op voorraad in deze hoeveelheid. Het maximale aantal op dit moment is <b>" . Product::where(['id' => $product['id']])->first()->stock . "</b>"))->error();
          return redirect()->back();
        }
      }

      if(session('shopping_cart') == [] || !session('shopping_cart')) {
        flash(__('flashes.order_without_products'))->error();
        return redirect()->back();
      }
      $user = Auth::user();
      return view('order', compact('user'));
    }

    public function totalPrice($products)
    {
      $total = 0.00;
      foreach($products as $p) {
        $total += $p->price;
      }

      return $total;
    }

    public function createOrder(Request $request)
    {

      if(session('shopping_cart') == [] || !session('shopping_cart')) {
        flash(__('flashes.order_without_products'))->error();
        return redirect()->back();
      }

      if(!$request->input('address')) {
        flash(__('Selecteer een adres om verder te gaan'))->error();
        return redirect()->back();
      }

      // Create order, need address from address table

      $address = Auth::user()->addresses()->where(['address_id' => $request->input('address'), 'user_id' => Auth::user()->id])->first();

      $order = new Order();
      $order->number = 510874 + Order::count();
      $order->status = 0;
      $order->customer_id = Auth::user()->id;
      $order->address_alias = $address->alias;
      $order->company_name = $address->company_name;
      $order->first_name = $address->first_name;
      $order->last_name = $address->last_name;
      $order->address_street = $address->address;
      $order->phone_number = $address->phone_number;
      $order->postal_code = $address->postal_code;
      $order->city = $address->city;

      $productsLow = [];
      $productsHigh = [];
      foreach(session('shopping_cart') as $product) {
        for($i = 0; $i < $product['amount']; $i++) {
          if (Product::find($product['id'])->where('tax_id', 1)) {
            array_push($productsHigh, Product::find($product['id'])->where('tax_id', 1)->first());
          }
        }
      }

      foreach(session('shopping_cart') as $product) {
        for($i = 0; $i < $product['amount']; $i++) {
          if (Product::find($product['id'])->where('tax_id', 2)) {
            array_push($productsLow, Product::find($product['id'])->where('tax_id', 1)->first());
          }
        }
      }

      $session_products = array_merge($productsLow, $productsHigh);

      $order->tax_low = number_format($this->totalPrice($productsLow), 2);
      $order->tax_high =  number_format($this->totalPrice($productsHigh), 2);
      $order->total_price = number_format($this->totalPrice($productsLow + $productsHigh), 2);
      $order->save();
      $order->products()->saveMany($session_products);
      Auth::user()->orders()->save($order);

      session(['last_created_order_id' => $order->id]);
      session()->forget('shopping_cart');

      // return redirect()->action('OrderController@loadOrderConfirmed');
      return app('App\Http\Controllers\PaymentController')->preparePayment();
    }

    public function loadOrderConfirmed()
    {
      $lastCreatedOrderId = session("last_created_order_id");

      $order = Order::find($lastCreatedOrderId);

      foreach ($order->products as $p ) {
        $product = Product::find($p->id);
        $product->stock -= 1;
        $product->save();
      }

      if (!$lastCreatedOrderId) return app('App\Http\Controllers\IndexController')->index();

      return view('order-confirmed', [
        'lastCreatedOrderId' => $lastCreatedOrderId,
        'paid' => Order::find($lastCreatedOrderId)->is_paid
      ]);
    }

    public function loadOrderOverview()
    {
      $user = Auth::user();
      return view('account.order-overview', compact('user'));
    }

    public function loadOrderDetails($id)
    {
      $user = Auth::user();
      $order = Order::find($id);
      if (!$user->orders->find($id)) return abort(404);
      $items = [];
      $products = [];
      $itemExists = false;
        foreach($order->products as $p) {
          foreach($items as $key => $item) {
            if($item['id'] == $p->id) {
              $items[$key]['amount']++;
              $itemExists = true;
            }
          }
          if(!$itemExists) {
            array_push($items, ['id' => $p->id, 'amount' => 1]);
          }
          $itemExists = false;
        }

        foreach($items as $product) {
          array_push($products, ['product' => \App\Product::find($product['id']), 'amount' => $product['amount']]);
        }

      // TODO Check if order belongs to user
      return view('account.order-details', compact('user', 'order', 'products'));
    }
}
