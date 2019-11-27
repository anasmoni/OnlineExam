<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class McqOptions extends Model{
    protected $table  = "mcq_options";
    protected $fillable = ['question_id' , 	'option_text' , 	'option_img'];
}
