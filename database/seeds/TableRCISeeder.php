<?php

use Illuminate\Database\Seeder;

class TableRCISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $random_consistency_index = array(
    array('id' => '1','jumlah_indeks' => '1','nilai_indeks' => '0.00','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
    array('id' => '2','jumlah_indeks' => '2','nilai_indeks' => '0.00','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
    array('id' => '3','jumlah_indeks' => '3','nilai_indeks' => '0.58','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
    array('id' => '4','jumlah_indeks' => '4','nilai_indeks' => '0.90','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
    array('id' => '5','jumlah_indeks' => '5','nilai_indeks' => '1.12','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
    array('id' => '6','jumlah_indeks' => '6','nilai_indeks' => '1.24','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
    array('id' => '7','jumlah_indeks' => '7','nilai_indeks' => '1.32','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
    array('id' => '8','jumlah_indeks' => '8','nilai_indeks' => '1.41','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
    array('id' => '9','jumlah_indeks' => '9','nilai_indeks' => '1.45','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
    array('id' => '10','jumlah_indeks' => '10','nilai_indeks' => '1.49','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
    array('id' => '11','jumlah_indeks' => '11','nilai_indeks' => '1.51','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
    array('id' => '12','jumlah_indeks' => '12','nilai_indeks' => '1.48','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
    array('id' => '13','jumlah_indeks' => '13','nilai_indeks' => '1.56','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
    array('id' => '14','jumlah_indeks' => '14','nilai_indeks' => '1.57','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
    array('id' => '15','jumlah_indeks' => '15','nilai_indeks' => '1.59','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17')
  );

  DB::table('indeks_konsistensi_acak')->insert($random_consistency_index);
    }
}
