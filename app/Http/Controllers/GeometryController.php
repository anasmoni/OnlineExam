<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
* @group Geometry
* It gives some geometrical problems to the kids.
* Kids try to solve it by drawing & hence their geometrical knowledge is improved.
*/
class GeometryController extends Controller
{
    //
    /**
	*Hexagone
	*Tells the user to draw one-sixth th of a hexagone;
    */
    public function hexagone(){
    	return view('hexagone');
    }

    /**
	*Triangle
	*Tells the user to draw one-third of a triangle.
    */
    public function triangle(){
    	return view('triangle');
    }

    /**
	*Triangle0
	*Tells the user to draw half of a triangle.
    */
    public function triangle0(){
    	return view('triangle0');
    }
}
