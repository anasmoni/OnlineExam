<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
/**
*@group Filtering    
*APIs for filtering questions 
*based on some subject / topics.
*
*/
class FilterQBankController extends Controller
{
    /**
   *Show questions
   *shows all the questions in different view(blade) 
   *
   */

   	public function show(){
   		return view('FilterQuestions') ;
   	}
    
    /**
   * Filter
   * @bodyParam string subject which subjects question the user is willing to filter  
   * @bodyParam string topic which topic's question the user is willing to filter
   * based on this topic & subject the query is executed
   */

   	public function Filter(Request $req){
   		$sub  = $req->subject;
   		$top = $req->topic;
//   		printf("%s > %s",$sub,$top);
   		$ret  = DB::table('questions')->where('subject','=',$sub)
   									  ->where('topic','=',$top)
   									  ->get();
  	//	$id = Auth::id();

   	  $array = array();
      $ara = array();
       foreach($ret as $t){
      //       $temp = DB::table('questions')->where('id','=',$t->id)
                                      //    ->get()->first(); 
            $ans = DB::table('mcq_options')->where('question_id','=',$t->id)
                                           ->get();
 //          printf('--> %s\n',$t->question);
            array_push($array, $ans);
//            array_push($ara,$temp);
        }
        //return view('ShowQuestions')->with('ret',$ret); */  
        return view('ShowQuestions',compact('ret','array'));
   	}
}
