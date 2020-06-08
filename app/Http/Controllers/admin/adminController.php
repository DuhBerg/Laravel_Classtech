<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class adminController extends Controller
{
  public function index()
  {
    $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));
    return view('admin.adminTela',compact('user'));
  }




}
