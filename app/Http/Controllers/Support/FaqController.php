<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function loadIndex()
    {
      return view('faq.index');
    }

    public function loadOrder()
    {
      return view('faq.order');
    }

    public function loadCancel()
    {
      return view('faq.cancel');
    }

    public function loadGuarantee()
    {
      return view('faq.guarantee');
    }

    public function loadPay()
    {
      return view('faq.pay');
    }

    public function loadAccount()
    {
      return view('faq.account');
    }

    public function loadCadeau()
    {
      return view('faq.cadeau');
    }

    public function loadPrivacy()
    {
      return view('faq.privacy');
    }

    public function loadOther()
    {
      return view('faq.other');
    }
}
