<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnsSheet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('AnsSheet', function (Blueprint $table) {
        $table->integer('anssheet_id')->references('anssheet_id')->on('participationhistories');
          $table->integer('question_id')->references('id')->on('questions');
          $table->integer('choosenOption');
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
