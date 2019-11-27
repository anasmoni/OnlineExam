<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exam;
use App\subjects;
use App\topics;
use Carbon\Carbon;
use App\QuestionsSheet;
/** 
*@group SetModelTest   
*APIs for adding new subjects & topics from the admin panel.  
*/
class setMTestController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct(){
       $this->middleware('auth');
    }

   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */

    public function index(){

      $subjects = subjects::select('Name')
            ->groupBy('Name')
            ->orderByRaw('Name')
            ->get();

      $topics = topics::select('Topic')
            ->groupBy('Topic')
            ->orderByRaw('Topic')
            ->get();

        

      return view('setMtest',compact('subjects','topics'));
    }
    /**
   * InsertMcqSheet
   * New exam is inserted in the exam's table. 
   */
    public function InsertMCQSheet(Request $req){
      Exam::insert([
        'type'	=> $req->catagory,
        'start_time' => date("Y-m-d g:i:s", strtotime($req->start_time)),
        'end_time'	  => date("Y-m-d g:i:s", strtotime($req->end_time)),
        'setter_id'     => \Auth::user()->id,
      ]);
        $id = Exam::max('id');
        $topic  = $req->topic;
        $requests  = DB::table('questions')->where('subject','=',$req->subject)
                                          ->where('topic','=',$req->topic)
                                          ->get();
        foreach($requests as $temp){
         //   printf("id: %d , Main question : %s\n",$temp->id,$temp->question);            
           $Q = new QuestionsSheet();
           $Q->exam_id = $id;
           $Q->question_id = $temp->id;
           $Q->save();
        }
    //    printf("Ok---------> %d\n",$id);  
     //   return redirect('/testing');
    }
}
