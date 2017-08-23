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
        Schema::table('ringkasan_penilaian', function($table){
          $table->dropForeign('ringkasan_penilaian_kriteria_id_foreign');
          $table->dropColumn('kriteria_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('ringkasan_penilaian', function($table){
        $table->integer('kriteria_id')->unsigned();
        $table->foreign('kriteria_id')->references('id')->on('kriteria');
      });
    }
}
