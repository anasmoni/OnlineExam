<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{
    //
    public function show( $name = null ){
      $idx  = Auth::id();

      if( $name != null )
      {
      //  echo $name.'------------whatever' ;
        $user = DB::table('users')->where('name','=',$name)
      									  ->first() ;
        $idx = $user->id ;
      }
      else{
        $user = DB::table('users')->where('id','=',$idx)
      									  ->first() ;
        $name = $user->name ;
      }

    	$result = DB::table('UserRatings')->where('userId','=',$idx)
    									  ->join('subjects','subjectId','=','subjects.id')
    									  ->get() ;
/*
   		$users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
*/


     ///   print_r($result) ;
        // foreach($result as $t){
        // 	echo $t->rating.'--------------'.$t->Name;
        // }
        //echo $result->rating.'balalallalal'.$result->Name;
    	return view('profile' , compact('result','name') );
    }
}
