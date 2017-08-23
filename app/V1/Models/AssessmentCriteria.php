<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentCriteria extends Model
{
    protected $table = 'hasil_penilaian_kriteria';

    protected $fillable = [
      'calon_id', 'kriteria_id', 'nilai', 'tahun_id', 'created_by', 'updated_by'
    ];

    public function alternative(){
      return $this->hasOne('App\V1\Models\Alternative', 'id', 'calon_id');
    }

    public function criteria(){
      return $this->hasOne('App\V1\Models\Criteria', 'id', 'kriteria_id');
    }

    public function year(){
      return $this->hasOne('App\V1\Models\Year', 'id', 'tahun_id');
    }
}
