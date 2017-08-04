<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    protected $table = 'alternative';

    protected $fillable = [
      'alternative', 'birthdate', 'address', 'phone_number', 'salary', 'division_id', 'created_by', 'updated_by'
    ];

    public $validate = [
      'alternative' => 'required',
      'birthdate' => 'required',
      'address' => 'required',
      'phone_number' => 'required',
      'salary' => 'required',
      'division_id' => 'required',
    ];

    public function division(){
      return $this->hasOne('App\V1\Models\Division', 'id', 'division_id');
    }

    public function getRouteKeyName(){
      return 'alternative';
    }
}
