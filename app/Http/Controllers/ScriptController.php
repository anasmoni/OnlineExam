<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
/** 
*@group Script   
*APIs for showing the editorial page.  
*/
class ScriptController extends Controller
{
   /**
   *ShowEditorialAndEverything
   *Shows details of the exam.
   */
    public function show(Request $req){
    //	echo $req->butt.'<br>';
    	$ret = DB::table('anssheet')->where('anssheet_id','=',$req->butt)->get();
    //	print_r($ret);
    	 $array = array();
      	 $ara = array();
      	 $choosenOps = array();
    	 foreach($ret as $t){
    	 	$choosenOp = (int)$t->choosenOption;
          	 array_push($choosenOps, $choosenOp);
          	$temp = DB::table('questions')->where('id','=',$t->question_id)
                                          ->get()->first(); 
            $ans = DB::table('mcq_options')->where('question_id','=',$t->question_id)
                                           ->get();
            array_push($array, $ans);
            array_push($ara,$temp);
    	}
    	return view('showScript',compact('array','ara','choosenOps'));
    }
}
