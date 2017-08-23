<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class CriteriaComparison extends Model
{
    protected $table = 'perbandingan_kriteria';

    protected $fillable = [
      'kriteria_id_1', 'kriteria_id_2', 'tingkat_kepentingan_id', 'created_by', 'updated_by'
    ];

    public $validate = [
      'kriteria_id_1' => 'required',
      'kriteria_id_2' => 'required',
      'tingkat_kepentingan_id' => 'required',
    ];

    public function criteria1(){
      return $this->hasOne('App\V1\Models\Criteria', 'id', 'kriteria_id_1');
    }

    public function criteria2(){
      return $this->hasOne('App\V1\Models\Criteria', 'id', 'kriteria_id_2');
    }

    public function importance_level(){
      return $this->hasOne('App\V1\Models\ImportanceLevel', 'id', 'tingkat_kepentingan_id');
    }
}
