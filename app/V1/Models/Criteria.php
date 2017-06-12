<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'criteria';

    protected $fillable = [
      'criteria'
    ];

    public $validate = [
      'criteria' => 'required'
    ];

    public function data_alternative(){
      return $this->hasMany('App\V1\Models\DataAlternative', 'criteria_id', 'id');
    }
}
