<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'divisi';

    protected $fillable = [
      'nama', 'created_by', 'updated_by'
    ];

    public $validate = [
      'nama' => 'required'
    ];
}
