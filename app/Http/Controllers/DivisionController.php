<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\V1\Models\Division;

class DivisionController extends Controller
{
    var $division;

    public function __construct(){
      $this->division = new Division();
    }

    public function index(){
      $division = $this->division->all();
      return views('division.index', compact('division'));
    }

    public function create(){
      
    }
}
