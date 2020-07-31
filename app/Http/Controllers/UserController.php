<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loadDetails()
    {
      $user = Auth::user();
      return view('account.details', compact('user'));
    }

    public function editDetails(Request $request)
    {

      $request->validate([
        'first_name' => ['required', 'max:255'],
        'last_name' => ['required', 'max:255'],
      ]);

      if(!($request->input('email') == Auth::user()->email)) {
        if(User::where(['email' => $request->input('email')])->first()) {
          flash("Het e-mailadres dat je hebt ingevuld (<b>".$request->input('email')."</b>) is al in gebruik")->error();
          return redirect()->back();
        }
      }

      $user = Auth::user();
      if($user->email !== $request->input('email')) $user->email_verified_at = NULL;
      $user->company_name = $request->input('company_name');
      $user->first_name = $request->input('first_name');
      $user->last_name = $request->input('last_name');
      $user->email = $request->input('email');
      $user->gender = $request->input('gender');
      $user->save();

      $user->sendEmailVerificationNotification();

      flash(__('flashes.user_details_changed'))->success();
      return redirect()->back();
     }

     public function changeWebTheme(Request $request)
     {

       $joe = 'ja';
       $nee = 'nee';

       $theme = $request->session()->get('dark_theme');

       // return dd($test);

       // if ($request->session()->has('web_theme')) {
       //   if ($request->session()->get('web_theme', 'dark')) {
       //     $request->session()->put('web_theme', 'white');
       //   }
       //
       //   if ($request->session()->get('white')) {
       //     $request->session()->put('web_theme', 'dark');
       //   }
       //   $request->session()->put('web_theme', 'dark');
       // }

       if ($theme) {
         $request->session()->put('dark_theme', false);
       } else {
         $request->session()->put('dark_theme', true);
       }



       return redirect()->back();
     }
}
