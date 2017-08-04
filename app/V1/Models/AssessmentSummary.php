<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentSummary extends Model
{
  protected $table = 'assessment_summary';

  protected $fillable = [
    'alternative_id', 'criteria_id', 'value', 'rank_salary_id', 'year_id', 'created_by', 'updated_by'
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

  public function salary(){
    return $this->hasOne('App\V1\Models\RankSalary', 'id', 'rank_salary_id');
  }
}
