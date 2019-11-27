<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullvalueToMcqOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mcq_options', function (Blueprint $table) {

            $table->string('option_text')->nullable()->change();
            $table->string('option_img')->nullable()->change();          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mcq_options', function (Blueprint $table) {
            //
        });
    }
}
