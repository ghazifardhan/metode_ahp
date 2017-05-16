<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\V1\Models\DataAlternative;
use App\V1\Models\Criteria;

class DataAlternativeController extends Controller
{
    private $data_alternative;

    public function __construct(){
      $this->data_alternatif = new DataAlternative();
      $this->middleware('auth');
    }

    public function index($id){
      $data_alternative = $this->data_alternatif
    }
}
