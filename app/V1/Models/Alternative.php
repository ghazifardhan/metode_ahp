<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    protected $table = 'alternative';

    protected $fillable = [
      'alternative', 'age', 'address'. 'phone_number', 'salary', 'division_id'
    ];

    public function division(){
      return $this->hasOne('App\V1\Models\Division', 'id'. 'division_id');
    }
}
