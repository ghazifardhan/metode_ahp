<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDataAlternative extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_calon', function(Blueprint $table){
          $table->increments('id');
          $table->integer('calon_id')->unsigned();
          $table->integer('kriteria_id')->unsigned();
          $table->integer('nilai');
          $table->timestamps();

          $table->foreign('calon_id')->references('id')->on('calon')->onDelete('cascade');
          $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_calon');
    }
}
