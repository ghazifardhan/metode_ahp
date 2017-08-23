<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    protected $table = 'calon';

    protected $fillable = [
      'calon', 'tanggal_lahir', 'alamat', 'nomor_hp', 'gaji', 'divisi_id', 'created_by', 'updated_by'
    ];

    public $validate = [
      'calon' => 'required',
      'alamat' => 'required',
      'tanggal_lahir' => 'required',
      'nomor_hp' => 'required',
      'gaji' => 'required',
      'divisi_id' => 'required',
    ];

    public function division(){
      return $this->hasOne('App\V1\Models\Division', 'id', 'divisi_id');
    }
}
