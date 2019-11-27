<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ParticipationHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ParticipationHistory', function (Blueprint $table) {

          $table->bigIncrements('anssheet_id');
          $table->integer('exam_id')->references('id')->on('exams');
          $table->integer('user_id')->references('id')->on('users');
          $table->integer('score');
          

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
