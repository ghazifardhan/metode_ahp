<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class RankSalary extends Model
{
    protected $table = 'rank_salary';

    protected $fillable = [
    	'rank', 'up_salary', 'created_by', 'updated_by'
    ];

    public $validate = [
      'rank' => 'required',
      'up_salary' => 'required'
    ];
}
