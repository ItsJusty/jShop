<?php

namespace App\Http\Controllers;

use App\Address;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function loadAddresses()
    {
      $user = Auth::user();
      return view('account.addresses', compact('user'));
    }

    public function loadNewAddress()
    {
      $user = Auth::user();
      return view('account.new_address', compact('user'));
    }

    public function addAddress(Request $request)
    {
      $request->validate([
        'alias' => 'required|max:38',
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'address' => 'required|max:255',
        'postal_code' => 'required|max:255',
        'city' => 'required|max:255',
      ]);

      $address = new Address();
      $address->alias = $request->input('alias');
      $address->company_name = $request->input('company_name');
      $address->first_name = $request->input('first_name');
      $address->last_name = $request->input('last_name');
      $address->address = $request->input('address');
      $address->postal_code = $request->input('postal_code');
      $address->city = $request->input('city');
      $address->phone_number = $request->input('phone_number');
      $address->save();
      Auth::user()->addresses()->save($address);

      flash(__('flashes.added_address'))->success();
      return redirect()->route('my-addresses');
    }

    public function loadEditAddress($id)
    {
      if(!Auth::user()->addresses()->find($id)) return abort(404);

      $address = Auth::user()->addresses()->find($id);

      return view('account.edit_address', compact('address'));
    }

    public function editAddress(Request $request)
    {

      if(!Auth::user()->addresses()->find($request->input('id'))){
        return abort(404);
      }

      $request->validate([
        'alias' => 'required|max:38',
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'address' => 'required|max:255',
        'postal_code' => 'required|max:255',
        'city' => 'required|max:255',
      ]);

      $address = Address::find($request->input('id'));
      $address->alias = $request->input('alias');
      $address->company_name = $request->input('company_name');
      $address->first_name = $request->input('first_name');
      $address->last_name = $request->input('last_name');
      $address->address = $request->input('address');
      $address->postal_code = $request->input('postal_code');
      $address->city = $request->input('city');
      $address->phone_number = $request->input('phone_number');
      $address->save();
      flash("Je adres met de naam <b>$address->alias</b> is succesvol aangepast")->success();
      return redirect()->route('my-addresses');
    }

    public function removeAddress($id)
    {
      if(Auth::user()->addresses()->find($id)) {
        $address = Address::find($id);
        $address->delete();
        flash('Dit adres is definitief verwijderd uit ons systeem.')->success();
        return redirect()->back();
      } else {
        flash('Er is een fout opgetreden met het verwijderen van dit adres. Of het is al verwijderd. ' . $id)->error();
        return redirect()->back();
      }
    }
}
