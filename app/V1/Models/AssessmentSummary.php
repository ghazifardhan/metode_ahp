<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentSummary extends Model
{
  protected $table = 'ringkasan_penilaian';

  protected $fillable = [
    'calon_id', 'kriteria_id', 'nilai', 'peringkat_gaji_id', 'tahun_id', 'created_by', 'updated_by'
  ];

  public function alternative(){
    return $this->hasOne('App\V1\Models\Alternative', 'id', 'calon_id');
  }

  public function year(){
    return $this->hasOne('App\V1\Models\Year', 'id', 'tahun_id');
  }

  public function salary(){
    return $this->hasOne('App\V1\Models\RankSalary', 'id', 'peringkat_gaji_id');
  }

  public function division(){
    return $this->hasOne('App\V1\Models\Division', 'id', 'divisi_id');
  }
}
