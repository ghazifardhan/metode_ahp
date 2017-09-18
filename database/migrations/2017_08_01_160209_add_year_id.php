<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYearId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_calon',function($table){
            $table->integer('tahun_id')->after('nilai')->unsigned();
            //$table->foreign('year_id')->references('id')->on('year');
        });

        Schema::table('data_calon',function($table){
            //$table->integer('year_id')->after('value')->unsigned();
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
        Schema::table('data_calon',function($table){
            $table->dropColumn('tahun_id');
            $table->dropForeign(['tahun_id']);
        });
    }
}
