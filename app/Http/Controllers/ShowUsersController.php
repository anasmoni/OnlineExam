<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class ShowUsersController extends Controller
{
  public function show(){

    $userInformation  = DB::table('users')->get();

    return view('ShowUsers',compact('userInformation',));
  }
}
