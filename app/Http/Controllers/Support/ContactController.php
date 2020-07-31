<?php

namespace App\Http\Controllers\Support;

use Illuminate\Support\Facades\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function loadContactForm()
    {
      return view('support.contact_form');
    }

    public function submitForm(Request $request)
    {
      $request->validate([
        'first_name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required',
        'message' => 'required|max:1200',
      ]);

      $data = [
        'first_name' => $request->first_name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message
      ];

      Notification::route('mail', 'klantenservice@geekr.nl')->notify(new \App\Notifications\ContactFormNotification($data));

      flash('Je vraag is verzonden naar onze klantenservice!')->success();
      return redirect()->back();

    }
}
