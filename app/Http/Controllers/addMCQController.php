<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use App\McqOptions;

/**
*@group MCQ 
*APIs for inserting mcq for the exam.
*Each mcq has problem statement , correct option,
*all other options , difficulty ,from which subject this question
*belongs to along with the topic. 
*/

class addMCQController extends Controller{
  protected $redirectTo = '/home';
  public function __construct(){
     
     $this->middleware('auth');
 }

  /**
  *Index
  *Shows the application dashboard,
  *most importantly the front UI. 
  */

  public function index(){
      return view('AddMCQ');
  }

  /**
  *InsertMCQ
  *@bodyParam question string required the problem statement
  *@bodyParam image string required if the question contains any image
  *@bodyParam subject string required from which subject the question belongs to
  *@bodyParam topic string required which topic the question belongs to
  *@bodyParam short_note string required short tutorial of about the answer
  *@bodyParam subject string required which subjects question the user is willing to filter
  *@bodyParam difficulty int required the problem's difficulty in the range from 1 to 4
  *@bodyParam correct_option int required correct option of the question
  *@bodyParam options string required all options of the question
  */

  public function InsertMCQ(Request $request){
      $temp = new Questions(); 
      $temp->question = $request->input('question');
      echo $temp->question;
      if($request->hasfile('picQ')){
        $file = $request->file('picQ');
        $extension = $file->getClientOriginalExtension(); //getting image extension
        $filename = time().'.'.$extension;
        $file->move('uploads/questions',$filename);
        $temp->question_img = $filename;
      }
      else{
    //    return $request ;
        $temp->question_img='xxxx';
//        echo "No IMageeeeeeeeeeeeee";
      }
      $temp->subject = $request->input('subject');
      $temp->topic = $request->input('topic');
      $temp->note = $request->input('sNote');
      $temp->difficulty = $request->input('difficulty');
      $temp->correctOption = $request->input('correct_option');
      $temp->save();
  

      $id = Questions::max('id'); 
      $mcq = new McqOptions();
      $mcq->question_id = $id;
//      McqOptions::insert([
//        'question_id'	=> $id,
       if($request->has('opA')){$mcq->option_text = $request->opA ; }
       else{ $mcq->option_text = 'xxxx' ; }
//        'option_img'	  => $req->picA
        if($request->hasfile('picA')){
              $file = $request->file('picA');
              $extension = $file->getClientOriginalExtension(); //getting image extension
              $filename = time().'.'.$extension;
              $file->move('uploads/Options',$filename);
              $mcq->option_img = $filename;
      }
        else{
    //    return $request ;
              $mcq->option_img = 'xxxx';
        }
      $mcq->save();

      $mcq1 = new McqOptions();
      $mcq1->question_id = $id;
       if($request->has('opB')){$mcq1->option_text = $request->opB ; }
       else{ $mcq1->option_text = 'xxxx' ; }
        if($request->hasfile('picB')){
              $file = $request->file('picB');
              $extension = $file->getClientOriginalExtension(); //getting image extension
              $filename = time().'.'.$extension;
              $file->move('uploads/Options',$filename);
              $mcq1->option_img = $filename;
      }
        else{
    //    return $request ;
              $mcq1->option_img = 'xxxx';
        }
      $mcq1->save();

       $mcq2 = new McqOptions();
      $mcq2->question_id = $id;
       if($request->has('opC')){$mcq2->option_text = $request->opC ; }
       else{ $mcq2->option_text = 'xxxx' ; }
        if($request->hasfile('picC')){
              $file = $request->file('picC');
              $extension = $file->getClientOriginalExtension(); //getting image extension
              $filename = time().'.'.$extension;
              $file->move('uploads/Options',$filename);
              $mcq2->option_img = $filename;
      }
        else{
    //    return $request ;
              $mcq2->option_img = 'xxxx';
        }
      $mcq2->save();

      $mcq3 = new McqOptions();
      $mcq3->question_id = $id;
       if($request->has('opD')){$mcq3->option_text = $request->opD ; }
       else{ $mcq3->option_text = 'xxxx' ; }
        if($request->hasfile('picD')){
              $file = $request->file('picD');
              $extension = $file->getClientOriginalExtension(); //getting image extension
              $filename = time().'.'.$extension;
              $file->move('uploads/Options',$filename);
              $mcq3->option_img = $filename;
      }
        else{
    //    return $request ;
              $mcq3->option_img = 'xxxx';
        }
      $mcq3->save();

       $mcq4 = new McqOptions();
       $mcq4->question_id = $id;
       if($request->has('opE')){$mcq4->option_text = $request->opE ; }
        else{ $mcq4->option_text = 'xxxx' ; }
        if($request->hasfile('picE')){
              $file = $request->file('picE');
              $extension = $file->getClientOriginalExtension(); //getting image extension
              $filename = time().'.'.$extension;
              $file->move('uploads/Options',$filename);
              $mcq4->option_img = $filename;
      }
        else{
    //    return $request ;
              $mcq4->option_img = 'xxxx';
        }
      $mcq4->save();
      return back()->with('status', 'successfully inserted'); 
  }
}
