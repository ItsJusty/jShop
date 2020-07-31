<?php

namespace App\Http\Controllers;

use App\Address;
use App\Order;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mollie\Laravel\Facades\Mollie;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('account');
    }

    public function loadOrderOverview()
    {
      $user = Auth::user();
      return view('account.order-overview', compact('user'));
    }

}
