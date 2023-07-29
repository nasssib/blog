<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{

    public function index()
    {
       return view('admin.settings.settings')->with('settings',Setting::first());
    }
  public function update()
  {
    dd(request());
   //$setting = Setting::first();
  }
}
