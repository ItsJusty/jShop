<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:employee')->except('logout');
    }

    public function loadEmployeeLogin()
    {
      return view('auth.login');
    }

    public function employeeLogin(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:8',
      ]);

      if (Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
        // flash('iets 1')->success();
        // dd($request->email);
        return redirect()->route('employee-login');
      }
      flash('De combinatie van de ingevulde gegevens is niet bekend bij OSM')->error();
      // dd($request->email);
      return back()->withInput($request->only('email', 'remember'));
    }
}
