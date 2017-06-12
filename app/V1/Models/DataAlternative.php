<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class DataAlternative extends Model
{
    protected $table = 'data_alternative';

    protected $fillable = [
      'alternative_id', 'criteria_id', 'value', 'created_at', 'updated_at'
    ];

    public $validate = [
      'alternative_id' => 'required',
      'criteria_id' => 'required',
      'value' => 'criteria'
    ];

    public function alternative(){
      return $this->hasOne('App\V1\Models\Alternative', 'id', 'alternative_id');
    }

    public function criteria(){
      return $this->criteria('App\V1\Models\Criteria', 'id', 'criteria_id');
    }
}
