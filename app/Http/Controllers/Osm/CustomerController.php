<?php

namespace App\Http\Controllers\Osm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Order;

class CustomerController extends Controller
{
    public function loadOsmCustomers()
    {
      // $orders = Order:
      $customers = User::get();
      return view('osm.store.customer.list', compact('customers'));
    }

    public function loadEditCustomer($id)
    {
      $customer = User::find($id);
      if(!$customer) {
        return abort(404);
      }

      return view('osm.store.customer.edit', compact('customer'));
    }

    public function updateCustomer($id, Request $request)
    {
      $customer = User::find($id);
      if(!$customer) {
        flash("Geen klant gevonden met ID: $id");
        return redirect()->back();
      }

      $customer->first_name = $request->input('first_name');
      $customer->last_name = $request->input('last_name');
      $customer->email = $request->input('email');
      $customer->intern_note = $request->input('intern_note');
      $customer->receive_newsletter = $request->input('receive_newsletter');
      $customer->is_active = $request->input('is_active');
      $customer->gender = $request->input('gender');
      $customer->save();

      flash('Wijzigingen aan gebruiker met ID: <b>' . $customer->id . '</b> zijn opgeslagen!')->success();
      return redirect()->back();
    }

    public function toggleStatus(Request $request)
    {
      $id = $request->input('id');
      $customer = User::find($id);

      if($customer->is_active) {
        $customer->is_active = 0;
        $customer->save();
        flash('Klantenaccount met ID <b>' . $customer->id . '</b> is geblokkeerd')->error();
        return redirect()->back();
      } else {
        $customer->is_active = 1;
        $customer->save();
        flash('Klantenaccount met ID <b>' . $customer->id . '</b> is gedeblokkeerd')->success();
        return redirect()->back();
      }
    }
}
