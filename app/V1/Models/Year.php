<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Year extends Model
{
	use SoftDeletes;

    protected $table = 'year';

    protected $fillable = [
    	'year', 'created_by', 'updated_by'
    ];

    public $validate = [
      'year' => 'required',
    ];

    protected $dates = ['deleted_at'];
}
