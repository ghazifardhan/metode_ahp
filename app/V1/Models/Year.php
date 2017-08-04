<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'year';

    protected $fillable = [
    	'year', 'created_by', 'updated_by'
    ];

    public $validate = [
      'year' => 'required',
    ];
}
