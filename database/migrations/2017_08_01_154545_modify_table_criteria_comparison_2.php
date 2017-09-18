<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTableCriteriaComparison2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perbandingan_kriteria',function($table){
            $table->integer('tingkat_kepentingan_id')->unsigned()->change();

            $table->foreign('tingkat_kepentingan_id')->references('id')->on('tingkat_kepentingan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perbandingan_kriteria',function($table){
            $table->dropForeign(['tingkat_kepentingan_id']);
        });
    }
}
