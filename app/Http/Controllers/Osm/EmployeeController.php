<?php

namespace App\Http\Controllers\Osm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  public function loadIndex()
  {
    return view('osm.index');
  }

  public function loadDashboard()
  {
    return view('osm.dashboard');
  }
}
