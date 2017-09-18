<?php

use Illuminate\Database\Seeder;

class SeederTableCriteria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criteria = array(
            array(
                "kriteria" => "Disiplin dan Kehadiran"
            ),
            array(
                "kriteria" => "Sikap Dan Perilaku"
            ),
            array(
                "kriteria" => "Kemampuan Menyelesaikan Pekerjaan"
            ),
            array(
                "kriteria" => "Kerja Sama Antar Rekan"
            ),
            array(
                "kriteria" => "Kreatif Dan Inisiatif"
            ),
            array(
                "kriteria" => "Kadar Kepemimpinan"
            ),
            array(
                "kriteria" => "Memberikan Motivasi & Arahan Bagi Bawahannya"
            ),
            array(
                "kriteria" => "Contoh Dan Teladan"
            ),
            array(
                "kriteria" => "Penguasaan Dan Pengetahuan Tugas"
            ),
            array(
                "kriteria" => "Pengembangan Diri"
            ),
        );

        DB::table("kriteria")->insert($criteria);
    }
}
