<?php

use Illuminate\Database\Seeder;

class table_importance_level extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $importance_level = array(
          array('nama_tingkat'=>'Sama Penting Dengan (Nilai=1)', 'nilai_tingkat'=>'1'),
array('nama_tingkat'=>'Nilai Berdekatan Dengan (Nilai=2)', 'nilai_tingkat'=>'2'),
array('nama_tingkat'=>'Sedikit Lebih Penting Dari(Nilai=3)', 'nilai_tingkat'=>'3'),
array('nama_tingkat'=>'Nilai Berdekatan Dengan (Nilai=4)', 'nilai_tingkat'=>'4'),
array('nama_tingkat'=>'Lebih Penting Dari(Nilai=5)', 'nilai_tingkat'=>'5'),
array('nama_tingkat'=>'Nilai Berdekatan Dengan (Nilai=6)', 'nilai_tingkat'=>'6'),
array('nama_tingkat'=>'Lebih Mutlak Penting Dari(Nilai=7)', 'nilai_tingkat'=>'7'),
array('nama_tingkat'=>'Nilai Berdekatan Dengan (Nilai=8)', 'nilai_tingkat'=>'8'),
array('nama_tingkat'=>'Mutlak Penting Dari(Nilai=9)', 'nilai_tingkat'=>'9'),
array('nama_tingkat'=>'Nilai Berdekatan Dengan (Nilai=1/2)', 'nilai_tingkat'=>'0.5'),
array('nama_tingkat'=>'Sedikit Lebih Penting Dari(Nilai=1/3)', 'nilai_tingkat'=>'0.333333333333333'),
array('nama_tingkat'=>'Nilai Berdekatan Dengan (Nilai=1/4)', 'nilai_tingkat'=>'0.25'),
array('nama_tingkat'=>'Lebih Penting Dari(Nilai=1/5)', 'nilai_tingkat'=>'0.2'),
array('nama_tingkat'=>'Nilai Berdekatan Dengan (Nilai=1/6)', 'nilai_tingkat'=>'0.166666666666667'),
array('nama_tingkat'=>'Lebih Mutlak Penting Dari(Nilai=1/7)', 'nilai_tingkat'=>'0.142857142857143'),
array('nama_tingkat'=>'Nilai Berdekatan Dengan (Nilai=1/8)', 'nilai_tingkat'=>'0.125'),
array('nama_tingkat'=>'Mutlak Penting Dari(Nilai=1/9)', 'nilai_tingkat'=>'0.111111111111111'),

        );

        DB::table('tingkat_kepentingan')->insert($importance_level);
    }
}
