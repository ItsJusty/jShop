<?php

namespace App\Http\Controllers;

use App\Order;

use Illuminate\Http\Request;

use PDF;

class InvoiceController extends Controller
{
    public function download()
    {
      $order = Order::find(10);
      $data = [
        'test' => 'Een test bericht',
        'order' => $order
      ];

      $pdf = PDF::loadView('templates.invoice', $data);
      return $pdf->download('factuur.pdf');
    }

    public function load()
    {
      $order = Order::find(10);
      return view('templates.invoice', compact('order'));
    }
}
