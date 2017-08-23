<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditAllTableAddCreatedUpdatedBy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calon', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('hasil_penilaian_kriteria', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('ringkasan_penilaian', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('kriteria', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('perbandingan_kriteria', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('data_calon', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('divisi', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('tingkat_kepentingan', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('indeks_konsistensi_acak', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('peringkat_gaji', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('tahun_penilaian', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('calon', function($table){
        $table->dropForeign('calon_created_by_foreign');
        $table->dropForeign('calon_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('hasil_penilaian_kriteria', function($table){
        $table->dropForeign('hasil_penilaian_kriteria_created_by_foreign');
        $table->dropForeign('hasil_penilaian_kriteria_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('ringkasan_penilaian', function($table){
        $table->dropForeign('ringkasan_penilaian_created_by_foreign');
        $table->dropForeign('ringkasan_penilaian_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('kriteria', function($table){
        $table->dropForeign('kriteria_created_by_foreign');
        $table->dropForeign('kriteria_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('perbandingan_kriteria', function($table){
        $table->dropForeign('perbandingan_kriteria_created_by_foreign');
        $table->dropForeign('perbandingan_kriteria_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('data_calon', function($table){
        $table->dropForeign('data_calon_created_by_foreign');
        $table->dropForeign('data_calon_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('divisi', function($table){
        $table->dropForeign('divisi_created_by_foreign');
        $table->dropForeign('divisi_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('tingkat_kepentingan', function($table){
        $table->dropForeign('tingkat_kepentingan_created_by_foreign');
        $table->dropForeign('tingkat_kepentingan_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('indeks_konsistensi_acak', function($table){
        $table->dropForeign('indeks_konsistensi_acak_created_by_foreign');
        $table->dropForeign('indeks_konsistensi_acak_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('peringkat_gaji', function($table){
        $table->dropForeign('peringkat_gaji_created_by_foreign');
        $table->dropForeign('peringkat_gaji_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('tahun_penilaian', function($table){
        $table->dropForeign('tahun_penilaian_created_by_foreign');
        $table->dropForeign('tahun_penilaian_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });
    }
}
