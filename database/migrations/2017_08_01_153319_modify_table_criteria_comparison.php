<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTableCriteriaComparison extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perbandingan_kriteria', function($table){
            $table->renameColumn('nilai', 'tingkat_kepentingan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perbandingan_kriteria', function($table){
            $table->renameColumn('tingkat_kepentingan_id', 'nilai');
        });
    }
}
