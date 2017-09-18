<?php

use Illuminate\Database\Seeder;

class SeederTableCalon extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = array(
            array(
                "calon" => "Jarwo", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1), 
            array(
                "calon" => "Siti", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1), 
            array(
                "calon" => "Andre", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1), 
            array(
                "calon" => "Dwi Widiyanto", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1), 
            array(
                "calon" => "Budiyanto", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1), 
            array(
                "calon" => "Michael", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1), 
            array(
                "calon" => "Andre", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1), 
            array(
                "calon" => "Denis", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1), 
            array(
                "calon" => "Rendy", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1), 
            array(
                "calon" => "Ivan", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1), 
            array(
                "calon" => "Martin", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1), 
            array(
                "calon" => "Indra", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1), 
            array(
                "calon" => "Oky", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1), 
            array(
                "calon" => "Andy", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1), 
            array(
                "calon" => "Tommy", 
                "tanggal_lahir" => "1990-01-01", 
                "alamat" => "test", 
                "nomor_hp" => 123123, 
                "gaji" => 5000000, 
                "divisi_id" => 1, 
                "created_by" => 1, 
                "updated_by" => 1)
        );

        DB::table("calon")->insert($arr);
    }
}
