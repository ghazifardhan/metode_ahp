<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTableAssessmentSummary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assessment_summary', function($table){
          $table->dropForeign('assessment_summary_criteria_id_foreign');
          $table->dropColumn('criteria_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('assessment_summary', function($table){
        $table->integer('criteria_id')->unsigned();
        $table->foreign('criteria_id')->references('id')->on('criteria');
      });
    }
}
