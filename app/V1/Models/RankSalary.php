<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class RankSalary extends Model
{
    protected $table = 'peringkat_gaji';

    protected $fillable = [
    	'peringkat', 'kenaikan_gaji', 'created_by', 'updated_by'
    ];

    public $validate = [
      'peringkat' => 'required',
      'kenaikan_gaji' => 'required'
    ];
}
