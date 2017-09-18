<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTablePairwiseComparison extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hasil_perbandingan_kriteria', function($table){
          $table->double('nilai_konsistensi', 8,4)->after('konsistensi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hasil_perbandingan_kriteria', function($table){
          $table->dropColumn('nilai_konsistensi');
        });
    }
}
