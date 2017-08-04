<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'division';

    protected $fillable = [
      'name', 'created_by', 'updated_by'
    ];

    public $validate = [
      'name' => 'required'
    ];
}
