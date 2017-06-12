<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class CriteriaComparison extends Model
{
    protected $table = 'criteria_comparison';

    protected $fillable = [
      'criteria_id_1', 'criteria_id_2', 'value'
    ];

    public $validate = [
      'criteria_id_1' => 'required',
      'criteria_id_2' => 'required',
      'value' => 'required',
    ];

    public function criteria1(){
      return $this->hasOne('App\V1\Models\Criteria', 'id', 'criteria_id_1');
    }

    public function criteria2(){
      return $this->hasOne('App\V1\Models\Criteria', 'id', 'criteria_id_2');
    }

    public function importance_level(){
      return $this->hasOne('App\V1\Models\ImportanceLevel', 'id', 'value');
    }
}
