<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class McqOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('mcq_options', function (Blueprint $table) {
          $table->integer('question_id')->references('id')->on('questions');
          $table->mediumtext('option_text')->nullable;
          $table->mediumtext('option_img')->nullable; 
          $table->timestamps();           
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
