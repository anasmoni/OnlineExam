<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model{
    //
    protected $table  = "questions";
    protected $fillable = ['question' , 'question_img' , 'subject' ,	'topic' , 	'note' ,	'difficulty',	'correctOption'];
}
