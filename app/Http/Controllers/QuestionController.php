<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 
use Illuminate\Routing\Controller;
use App\ParticipationHistory;
use App\AnsSheet ;
use App\Exam;
use App\exams;
/** 
*@group Questions_Showing   
*APIs for showing the options of the mcqs.
*/
class QuestionController extends Controller{
   /**
   *Show all options of the question.
   *shows all the options in different view(blade) along with the corresponding question. 
   */
    public function show(){
    	$id = Auth::id();
    	$mytime = Carbon::now()->toDateTimeString();
      $mytime = date("Y-m-d H:i", strtotime($mytime));
    	// $results  = DB::table('exams')->where('setter_id','=',$id)
    	// 							  ->where('start_time','<=',$mytime)
    	// 							  ->orderby('start_time','desc')
    	// 							  ->first();
//       printf("---------------%d\n",$results->id);
//        print_r($results);
        $results = exams::max('id');
        if(empty($results)){
            
        }
        else{

  //        printf("---------------%d\n",$results->id);
  //        printf("Bad Coder");
        
//        if(!$results->isEmpty()){              
       $ret  = DB::table('QuestionsSheet')->where('exam_id','=',$results)
                                         ->join('questions','question_id','=','questions.id')
                                         ->get();                    
   //   print_r($ret);
      
      $array = array();
      $ara = array();
      $number = array();
       $i = 1;
       foreach($ret as $t){
  
            $temp = DB::table('questions')->where('id','=',$t->id)
                                          ->get()->first(); 
            $ans = DB::table('mcq_options')->where('question_id','=',$t->id)
                                         ->get();
            array_push($array, $ans);
            array_push($ara,$temp);
            array_push($number,$i);
            $i = $i + 1 ;
        }
        $total_time = end($number);
        //return view('ShowQuestions')->with('ret',$ret);  
        return view('ShowQuestions2',compact('ret','array','ara','number','results','total_time'));
     }                                 
    }
    /**
   * InsertAnsSheet
   * Users anssheet is inserted in the database which contains the chosen options(by the user),
   * his calculated score , the questions used in this exam.
   * @bodyParam string chosenOps which options the user has chosen in the mcq exam  
   */
    public function InsertAnsSheet(Request $req){
  
      $id = Auth::id();
      $mytime = Carbon::now()->toDateTimeString();
  
      $results  = DB::table('exams')->where('setter_id','=',$id)
                      ->where('start_time','<=',$mytime)
                      ->orderby('start_time','desc')
                      ->first();

       $ret  = DB::table('QuestionsSheet')->where('exam_id','=',$results->id)
                                         ->join('questions','question_id','=','questions.id')
                                         ->get();                    
        $score =  0 ;

        $wTotScore = 0 ;
        $wMyScore = 0 ;

        foreach($ret as $t){
          $qid = strval($t->id);

           
           $choosenOp = (int)$req->$qid;

           $score+=($t->correctOption == $choosenOp);

           $thisScore = 0.0 ;
           if( $t->difficulty == 1 ) $thisScore = 0.5 ;
           if( $t->difficulty == 2 ) $thisScore = 0.75 ;
           if( $t->difficulty == 3 ) $thisScore = 1.0 ;

           $wTotScore += $thisScore ;

           $wMycurScore = ($t->correctOption == $choosenOp)*$thisScore ;
           $wMyScore += $wMycurScore  ;


//           echo $thisScore.'---test---'.$wMycurScore.'.......' ;
        }

  //      echo $wMyScore.'--final--'.$wTotScore.'.......' ;

        $x = 0 ;
        foreach($results as $temp){
            $x = $results->id;
        }
        ParticipationHistory::insert([
              'exam_id' => $x ,
              'user_id'=> $id,
              'score' => $score,
           ]) ;

// Rating Calculation starts from here

        $examSubRow = DB::table('examsubjecttopics')->where('Exam_id','=',$results->id)
                                                    ->first() ;

        $examSub = $examSubRow->Subject ;

        $subIdRow = DB::table('subjects')->where('Name','=',$examSub)
                                        ->first() ;
        $subId = $subIdRow->id ;

    //    echo $subId.'--------balalalal' ;

        $curRatingRow = DB::table('UserRatings')->where('userId','=',$id)
                                               ->where('subjectId','=',$subId)
                                               ->first() ;

        $newScore = $wMyScore/$wTotScore ; 

        foreach($results as $tem){
            $x = $results->id;
        }

        $curRating = 50.0 ;

        if( empty( $curRatingRow ) )
        {
          DB::table('UserRatings')->insert(
            ['userId' => $id, 'subjectId' => $subId , 'rating' => 50.0 ]
          );
        }
        else{
          $curRating = $curRatingRow->rating ;
        }


        $totalQuestionCnt = count($ret) ;

        $scorePercentage = ( ($score+0.0) / ($totalQuestionCnt+0.0) )*100.0 ;
    //    echo $scorePercentage.'---------------whatever' ;

        $newRating =   ( $scorePercentage+$curRating )/2.0 ;

//        echo $curRating.'-----CurRating'.$scorePercentage.'---------cur Score.....'  ;

  //      echo $newRating.'   new Rating.......' ;

        DB::table('UserRatings')
            ->where('userId', $id)
            ->where('subjectId', $subId)
            ->update(['rating' => $newRating ]);

        /******* --------------Prepare to send in blade --------------- *****************/
      $array = array();
      $ara = array();
      $aid = ParticipationHistory::max('anssheet_id');

      $choosenOps = array();

       foreach($ret as $t){
          $qid = strval($t->id);
           
           
           $choosenOp = (int)$req->$qid;
           array_push($choosenOps, $choosenOp);

//           $score+=($t->correctOption == $choosenOp);
            $temp = DB::table('questions')->where('id','=',$t->id)
                                          ->get()->first(); 
            $ans = DB::table('mcq_options')->where('question_id','=',$t->id)
                                           ->get();
            array_push($array, $ans);
            array_push($ara,$temp);
           AnsSheet::insert([
              'anssheet_id' =>$aid,
              'question_id' => $t->id ,
              'choosenOption'=> $choosenOp,
           ]) ;
        }
      return view('ShowResults',compact('ret','array','ara','score', 'choosenOps'));   
    }
}
