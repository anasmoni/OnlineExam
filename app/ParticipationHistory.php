<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipationHistory extends Model{
    protected $table  = "participationhistory";
    protected $fillable = [ 'exam_id' , 'user_id' , 'score'];
}
