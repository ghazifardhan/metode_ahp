<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'year';

    protected $fillable = [
    	'year'
    ];

    public $validate = [
      'year' => 'required',
    ];
}
