<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRandomConsistencyIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indeks_konsistensi_acak', function(Blueprint $table){
          $table->increments('id');
          $table->integer('jumlah_indeks');
          $table->float('nilai_indeks');
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
        Schema::drop('indeks_konsistensi_acak');
    }
}
