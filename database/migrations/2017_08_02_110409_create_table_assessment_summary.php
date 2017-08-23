<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAssessmentSummary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ringkasan_penilaian', function(Blueprint $table){
        $table->increments('id');
        $table->integer('calon_id')->unsigned();
        $table->integer('kriteria_id')->unsigned();
        $table->float('nilai');
        $table->integer('peringkat_gaji_id')->unsigned();
        $table->integer('tahun_id')->unsigned();
        $table->timestamps();

        $table->foreign('calon_id')->references('id')->on('calon');
        $table->foreign('kriteria_id')->references('id')->on('kriteria');
        $table->foreign('peringkat_gaji_id')->references('id')->on('peringkat_gaji');
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
        Schema::drop('ringkasan_penilaian');
    }
}
