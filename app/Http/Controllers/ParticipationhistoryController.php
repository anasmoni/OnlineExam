<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 
use App\Exam;
use App\ParticipationHistory;
/**
*@group Participation    
*APIs for showing all the previous participations of the user. 
*From which he can get an overall overview of his performance.
*/
class ParticipationhistoryController extends Controller
{
   /**
   *Show all participations
   *shows all the participations of the user along with score,
   *the exam's topic, subject and date-time.
   */
    public function Show(){
    	$idx  = Auth::id();

    	$mytime  = Carbon::now()->toDateTimeString();

    	//echo $mytime;
//    	printf("Current time: %s , id: %d\n",$mytime,$idx);
    	$results = DB::table('participationhistory')->where('user_id','=',$idx)
    							 	 ->get();
//    	$ret = $results;
//        print_r($results);
        $array =  array();
    	$ExamInfo = array();
        $edetails = array();
        foreach ($results as $ret) {
    	//	$var  = DB::table('participationhistory')->where('exam_id','=',$ret->id)->get();
        //    foreach($var as $t){
         //           array_push($array,strval($t->score));
         //   }
  //      	printf("\n");
    	   $top = DB::table('examsubjecttopics')->where('Exam_id','=',$ret->exam_id)
                                                 ->get();
           
           if(count($top) > 0)
            {
                $sub = $top[0]->Subject;
                $tp = '';
                foreach ($top as $k) {
                    if(strlen($tp)>0) $tp = $tp . ', ' ;
                    $tp = $tp . $k->topic;
                }

                $detail = DB::table('exams')->where('id','=',$ret->exam_id)
                                            ->get()->first();

                $temparr = array();

                array_push($temparr, $ret->exam_id);
                array_push($temparr, $ret->anssheet_id);
                array_push($temparr, $sub);
                array_push($temparr, $tp);
                array_push($temparr, $ret->score);
                array_push($temparr, $detail->start_time);
                //print_r($detail);
        
                array_push($ExamInfo, $temparr);
            }
        }

        // foreach ($ExamInfo as $k) {
        //     echo $k[0] . ' ' . $k[1] . ' ' . $k[2] . ' ' . $k[3].' '.$k[5] . '<br>';
        // }
//        print_r($results);
    	return view('PastExams',compact('ExamInfo'));
    }
    /**
   *Testing
   *For testing purpose
   */
    public function show1(){
        return view('test');
    }

    /**
   *Show participations according to the user input topics
   *shows all the participations of the user along with score,
   *the exam's topic, subject and date-time depending on the selected topic
   * @bodyParam string Topic Which topics participation the user is willing to filter?  
   */
    public function filter(Request $req){
        $topic = $req->topic;
        echo $topic;
        $idx  = Auth::id();

        $mytime  = Carbon::now()->toDateTimeString();

        //echo $mytime;
//      printf("Current time: %s , id: %d\n",$mytime,$idx);
        $results = DB::table('participationhistory')->where('user_id','=',$idx)
                                     ->get();
//      $ret = $results;
//        print_r($results);
        $array =  array();
        $ExamInfo = array();
        $edetails = array();
        foreach ($results as $ret) {
        //  $var  = DB::table('participationhistory')->where('exam_id','=',$ret->id)->get();
        //    foreach($var as $t){
         //           array_push($array,strval($t->score));
         //   }
  //        printf("\n");
            $num = 219;
           $top = DB::table('examsubjecttopics')->where('Exam_id','=',$ret->exam_id)
                                                ->where('Exam_id','>',$num)
                                                ->where('topic','=',$topic)
                                                 ->get();
           
           if(count($top) > 0)
            {
                $sub = $top[0]->Subject;
                $tp = '';
                foreach ($top as $k) {
                    if(strlen($tp)>0) $tp = $tp . ', ' ;
                    $tp = $tp . $k->topic;
                }

                $detail = DB::table('exams')->where('id','=',$ret->exam_id)
                                            ->get()->first();

                $temparr = array();

                array_push($temparr, $ret->exam_id);
                array_push($temparr, $ret->anssheet_id);
                array_push($temparr, $sub);
                array_push($temparr, $tp);
                array_push($temparr, $ret->score);
                array_push($temparr, $detail->start_time);
                //print_r($detail);
        
                array_push($ExamInfo, $temparr);
            }
        }

        // foreach ($ExamInfo as $k) {
        //     echo $k[0] . ' ' . $k[1] . ' ' . $k[2] . ' ' . $k[3].' '.$k[5] . '<br>';
        // }
//        print_r($results);

        return view('PastExams',compact('ExamInfo'));
    }
}

