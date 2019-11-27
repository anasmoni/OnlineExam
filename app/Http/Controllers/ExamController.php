<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 
use App\exams;
use App\examsubjecttopics;
use App\QuestionsSheet;
/**
*@group Exam    
*APIs for participating in the exams 
*according to the selected subject,topics 
*and the number of questions,which user provides
*from the front end.
*/
class ExamController extends Controller{
    //
  /**
  *Participate in the exam
  *@bodyParam subject string required the subject the examinee is willing to take part.
  *@bodyParam topics string required Selected topics from that particular subject.
  *@bodyParam NumberOfQuestions int required How many questions will appear in the exam?
  */
    public function show(Request $req){
      // by Rana
//      echo $req->selected_topics . '   '. $req->subject.'<br>';
      $str_arr = explode (";",$req->selected_topics);  
      // by rana
    	$id = Auth::id();
    	$mytime = Carbon::now()->toDateTimeString();
//      echo "<br>";
      $mytime = date("Y-m-d H:i", strtotime($mytime));
//      printf("%s ----------------- %s , %s\n",date("Y-m-d H:i", strtotime($req->start_time)),$req->end_time,$mytime);
      printf("Current Time: %s",$mytime);
      $startTime = date("Y-m-d H:i:s");

//display the starting time
    //  echo 'Starting Time: '.$startTime;

      $cenvertedTime = date('Y-m-d H:i:s',strtotime('+15 seconds',strtotime($startTime)));

//display the converted time
   //   echo 'Converted Time (added 45 seconds): '.$cenvertedTime;

      $total_time = $req->number_of_questions * 45 ;
      $endTime = date('Y-m-d H:i:s',strtotime('+'.$total_time.' seconds',strtotime($startTime)));
     // echo 'endtime is : '.$endTime;

       exams::insert([
        'type'  => 1,
        'start_time' => date('Y-m-d H:i:s',strtotime('+15 seconds',strtotime($startTime))),
        'end_time'    => date('Y-m-d H:i:s',strtotime('+'.$total_time.' seconds',strtotime($startTime))),
        'setter_id'     => \Auth::user()->id,
      ]);

    	$results  = DB::table('exams')->where('setter_id','=',$id)
    								  ->where('start_time','>',$mytime)
    								  ->orderby('start_time','asc')
    								  ->get()
    								  ->first();
        $temp = $results;
        $ret = $results;
        foreach($str_arr as $key) {
            if( empty($key) ){}
            else{
                  examsubjecttopics::insert([
                  'Exam_id' =>  exams::max('id'),
                  'Subject' =>  $req->subject,
                  'topic' =>  $key,
              ]);
           }   
        }

        $topics = explode (";",$req->selected_topics);  // array
        
        array_pop($topics); // remove empty one

        $topic_count = count($topics);

        $topic_wise_questions = array();

        foreach ($topics as $t) {
           
           $questions  = DB::table('questions')->where('topic','=',$t)                  
                      ->orderby('difficulty','asc')
                      ->get()->toArray();

            shuffle($questions);

          array_push($topic_wise_questions, $questions);

        }

        $no_of_question = $req->number_of_questions;

        $diff_dist = array();// difiiculty wise question distribution
        $topic_dist = array();// topic wise question distribution

        $advanced = floor($no_of_question*(10/100)); 
        $hard = floor($no_of_question*(20/100));
        $medium = floor($no_of_question*(30/100));
        $easy = $no_of_question-$advanced-$hard-$medium;

//        echo $advanced . ' ' . $hard . ' ' . $medium . ' '. $easy . '<br>' ;

        array_push($diff_dist, 0);
        array_push($diff_dist, $easy);
        array_push($diff_dist, $medium);
        array_push($diff_dist, $hard);            
        array_push($diff_dist, $advanced);

        $left = $no_of_question;

        foreach ($topics as $t) {
          $now = floor($no_of_question/count($topics));
          array_push($topic_dist , $now);
          $left = $left - $now;
        }
        $topic_dist[count($topic_dist)-1] += $left; //give left over questions to last topic

        $Questions = array();
        //echo count($topic_wise_questions[0]);

        foreach ($topic_wise_questions[0] as $k) {
    //      echo $k->difficulty . ' ';
        }

        while ($no_of_question > 0) {

          $prev = $no_of_question;
          
          for($i=0; $no_of_question>0 && $i<count($topics); $i++) {
            
            if($topic_dist[$i] == 0) continue; // no more questions from this topic

            while(count($topic_wise_questions[$i])>0){

              $curr = end($topic_wise_questions[$i]);

              if($diff_dist[$curr->difficulty]>0){
               // echo  'diff ' . $curr->difficulty . ' ' . $diff_dist[$curr->difficulty] . ' then ';
                $diff_dist[$curr->difficulty]--;
                $topic_dist[$i]--;
                $no_of_question--;
             //   echo  $diff_dist[$curr->difficulty] . ' <br>';

                array_push($Questions, $curr);
                
                array_pop($topic_wise_questions[$i]);
                break;
              }
              else{
                array_pop($topic_wise_questions[$i]);
              //echo 'curr->diff ' . $curr->difficulty . '  ' . $diff_dist[$curr->difficulty] . '<br>';
              }

            }
          }
          if($prev == $no_of_question){
            echo 'bad coder ' . count($topic_wise_questions[0]) . '<br>';
            break;
          }
        }  

        foreach ($Questions as $k) {
            $temp = new QuestionsSheet();
            $temp->exam_id = exams::max('id') ;
            $temp->question_id = $k->id;
            $temp->save();
        }
     //   print_r($results);
        return view('countDown',compact('total_time')); 
    }
}
