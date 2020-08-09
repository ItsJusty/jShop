<?php

namespace App\Http\Controllers\Osm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
  public function loadIndex()
  {
    return view('osm.index');
  }

  public function loadDashboard()
  {
    $h = date('H');
    $greeting = "";
    $employee = Auth::guard('employee')->user();
    if ($h >= 00 && $h < 6) $greeting = "Goedenacht";
    if ($h >= 06 && $h < 12) $greeting = "Goedemorgen";
    if ($h >= 12 && $h < 18) $greeting = "Goedemiddag";
    if ($h >= 18 && $h < 00) $greeting = "Goedenavond";

    return view('osm.dashboard', compact('greeting', 'employee', 'h'));
  }
}
