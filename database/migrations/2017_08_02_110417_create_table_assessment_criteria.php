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
      Schema::create('hasil_penilaian_kriteria', function(Blueprint $table){
        $table->increments('id');
        $table->integer('calon_id')->unsigned();
        $table->integer('kriteria_id')->unsigned();
        $table->float('nilai');
        $table->integer('tahun_id')->unsigned();
        $table->timestamps();

        $table->foreign('calon_id')->references('id')->on('calon');
        $table->foreign('kriteria_id')->references('id')->on('kriteria');
        $table->foreign('tahun_id')->references('id')->on('tahun_penilaian');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hasil_penilaian_kriteria');
    }
}
