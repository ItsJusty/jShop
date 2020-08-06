<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class PaymentController extends Controller
{
    public function totalPrice($products)
    {
      $total = 0.00;
      foreach($products as $p) {
        $total += $p->price;
      }

      return $total;
    }

    public function preparePayment()
    {
      //TODO: Check if payments are getting created

      $order_id = session('last_created_order_id');

      if (Order::find($order_id)->is_paid) return abort(404);

      $payment = Mollie::api()->payments()->create([
        'amount' => [
          'currency' => 'EUR',
          'value' => number_format(Order::find(session('last_created_order_id'))->total_price, 2), // You must send the correct number of decimals, thus we enforce the use of strings
        ],
        'description' => "Bestelling ".Order::find(session('last_created_order_id'))->number." via Geekr.nl",
        'webhookUrl' => action('PaymentController@paymentReceive'),
        'redirectUrl' => action('PaymentController@paymentReceive'),
        'metadata' => [
          'order_id' => session('last_created_order_id'),
        ],
      ]);

      if(!$payment) return abort(404);

      $payment = Mollie::api()->payments()->get($payment->id);
      // redirect customer to Mollie checkout page
      session(['last_payment_id' => $payment->id]);
      return redirect($payment->getCheckoutUrl(), 303);
    }

    public function paymentReceive(Request $request)
    {
      //TODO: Check if payment is received and changed to paid in database when it finishes

      if (!session('last_payment_id')) return abort(404);

      $payment = Mollie::api()->payments()->get(session('last_payment_id'));

      if($payment->isPaid()) {
        $order = Order::find($payment->metadata->order_id);
        $order->is_paid = true;
        $order->payment_id = session('last_payment_id');

        $order->save();

        session()->forget('last_payment_id');

        $lastCreatedOrderId = session("last_created_order_id");

        return app('App\Http\Controllers\OrderController')->loadOrderConfirmed();
      }
    }
}
