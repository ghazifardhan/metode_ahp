<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamingTableToIndonesia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::rename("alternative", "calon");
        Schema::rename("assessment_criteria", "penilaian_kriteria");
        Schema::rename("assessment_summary", "ringkasan_penilaian");
        Schema::rename("criteria", "kriteria");
        Schema::rename("criteria_comparison", "perbandingan_kriteria");
        Schema::rename("data_alternative", "data_calon");
        Schema::rename("division", "divisi");
        Schema::rename("importance_level", "tingkat_kepentingan");
        Schema::rename("pairwise_comparison", "hasil_perbandingan_kriteria");
        Schema::rename("random_consistency_index", "indeks_konsitensi_acak");
        Schema::rename("rank_salary", "peringkat_gaji");
        Schema::rename("year", "tahun_penilaian");
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::rename("calon", "alternative");
        Schema::rename("penilaian_kriteria", "assessment_criteria");
        Schema::rename("ringkasan_penilaian","assessment_summary");
        Schema::rename("kriteria", "criteria");
        Schema::rename("perbandingan_kriteria","criteria_comparison");
        Schema::rename("data_calon","data_alternative");
        Schema::rename("divisi","division");
        Schema::rename("tingkat_kepentingan","importance_level");
        Schema::rename("hasil_perbandingan_kriteria","pairwise_comparison");
        Schema::rename("indeks_konsitensi_acak","random_consistency_index");
        Schema::rename("peringkat_gaji","rank_salary");
        Schema::rename("tahun_penilaian","year");
        */
    }
}
