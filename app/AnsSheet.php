<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnsSheet extends Model
{
    //
    protected $table  = "anssheet";
    protected $fillable = [ 'anssheet_id' , 'question_id' ,'choosenOption'];
}
