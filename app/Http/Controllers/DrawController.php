<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
*@group Drawing    
*APIs for drawing images 
*of the given figure.
*/
class DrawController extends Controller
{
    
   /**
   *Show
   *shows the front end. It contains 
   *the picture to draw & a painting tool
   *to draw it.
   */
    public function show(){
    	return view('draw');
    }
}
