<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentCriteria extends Model
{
    protected $table = 'assessment_criteria';

    protected $fillable = [
      'alternative_id', 'criteria_id', 'value', 'year_id'
    ];

    public function alternative(){
      return $this->hasOne('App\V1\Models\Alternative', 'id', 'alternative_id');
    }

    public function criteria(){
      return $this->hasOne('App\V1\Models\Criteria', 'id', 'criteria_id');
    }

    public function year(){
      return $this->hasOne('App\V1\Models\Year', 'id', 'year_id');
    }
}
