<?php

namespace App\V1\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Year extends Model
{
	use SoftDeletes;

    protected $table = 'tahun_penilaian';

    protected $fillable = [
    	'tahun', 'created_by', 'updated_by'
    ];

    public $validate = [
      'tahun' => 'required',
    ];

    protected $dates = ['deleted_at'];
}
