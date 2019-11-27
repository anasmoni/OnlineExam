<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 
use App\subjects;
use App\topics;
/** 
*@group Subject_Topic   
*APIs for adding new subjects & topics from the admin panel.  
*/
class SubjectTopicController extends Controller
{
    //
    /**
   *ShowSubjectTopic
   *Shows all the subjects & topics currently available in the database. 
   */
    public function show(){
    	return view('SubjectTopic');
    }

    /**
   * AddNewSubject/Topic
   * From this UI , the admin adds new subject & topic. 
   * @bodyParam string subject which subjects just came  
   * @bodyParam string topic which topic just appeared
   */

    public function index(Request $req){
    	$result = DB::table('subjects')->where('Name','=',$req->subject)
                                      ->get();
        if( $result->count() ){
         	// printf("Codeforces <3  ");
         	  $result = DB::table('subjects')->where('Name','=',$req->subject)
                                      ->get()->first();
         	  $ret = DB::table('topics')->where('id', '=' , $result->id)
         	 					->where('Topic' , '=' , $req->topic)
         	 					->get();
         	 if($ret->count()){
         	 	printf("Subject & Topic already Exists") ; 
         	 }
         	 else{
//          		printf("Here i am");
	          	topics::insert([
			         'id'  => $result->id,
			         'Topic'=>$req->topic,
			       ]);	
         	 }
        }
        else{
//        	printf("------------------->>>>>>>>>>>>>>");
        	subjects::insert([
        		'Name' => $req->subject,
        	]);
         	$res = DB::table('subjects')->where('Name', '=' , $req->subject)
         									->get()->first();
         							//print_r($res);
          	topics::insert([
		         'id'  => $res->id,
		         'Topic'=>$req->topic,
		       ]);
        //	printf("Done & Dusted");
        }
    }

}
