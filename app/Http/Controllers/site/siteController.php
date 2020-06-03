<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class siteController extends Controller
{
  public function index(){
    return view('index');
  }
}
