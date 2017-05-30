<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\V1\Models\RankSalary;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Redirect;


class RankSalaryController extends Controller
{
    var $rank_salary;

    public function __construct(){
    	$this->rank_salary = new RankSalary();
    }
}
