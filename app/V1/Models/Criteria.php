<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'kriteria';

    protected $fillable = [
      'kriteria', 'created_by', 'updated_by'
    ];

    public $validate = [
      'kriteria' => 'required'
    ];

    public function data_alternative(){
      return $this->hasMany('App\V1\Models\DataAlternative', 'kriteria_id', 'id');
    }
}
