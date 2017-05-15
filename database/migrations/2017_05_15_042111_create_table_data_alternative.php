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
        Schema::create('data_alternative', function(Blueprint $table){
          $table->increments('id');
          $table->integer('alternative_id')->unsigned();
          $table->integer('criteria_id')->unsigned();
          $table->integer('value');
          $table->timestamps();

          $table->foreign('alternative_id')->references('id')->on('alternative');
          $table->foreign('criteria_id')->references('id')->on('criteria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_alternative');
    }
}
