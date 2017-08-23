<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class PairwiseComparison extends Model
{
    protected $table = 'hasil_perbandingan_kriteria';

    protected $fillable = [
      't', 'ci', 'rci_id', 'konsistensi', 'nilai_konsistensi', 'created_by', 'updated_by'
    ];

    public function rci(){
      return $this->hasOne('App\V1\Models\RandomConsistencyIndex', 'id', 'rci_id');
    }
}
