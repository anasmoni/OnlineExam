<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionsSheet extends Model
{
    //
    protected $table  = "QuestionsSheet";
    protected $fillable = [ 'exam_id' , 'question_id'];
}
