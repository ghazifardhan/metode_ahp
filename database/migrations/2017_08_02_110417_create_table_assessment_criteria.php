<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAssessmentCriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('assessment_criteria', function(Blueprint $table){
        $table->increments('id');
        $table->integer('alternative_id')->unsigned();
        $table->integer('criteria_id')->unsigned();
        $table->float('value');
        $table->integer('year_id')->unsigned();
        $table->timestamps();

        $table->foreign('alternative_id')->references('id')->on('alternative');
        $table->foreign('criteria_id')->references('id')->on('criteria');
        $table->foreign('year_id')->references('id')->on('year');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('assessment_criteria');
    }
}
