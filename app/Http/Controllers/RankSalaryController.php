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
      $this->middleware('auth');
    }

    public function index(){
      $rank_salary = $this->rank_salary->all();
      $res['result'] = $rank_salary;
      return view('rank_salary.index', compact('rank_salary'));
    }

    public function store(Request $request){
      $this->rank_salary->fill([
        'rank' => $request->input('rank'),
        'up_salary' => $request->input('up_salary'),
      ]);
      $this->rank_salary->save();
      return Redirect::route('rank_salary.index');
    }

    public function create(){
      $res['create'] = true;
      $res['status'] = "Create New";
      $rank_salary = null;
      return view('rank_salary.form', compact('rank_salary', 'res'));
    }

    public function edit($id){
      $rank_salary = $this->rank_salary->find($id);
      $res['create'] = false;
      $res['status'] = "Update";
      return view('rank_salary.form', compact('rank_salary', 'res'));
    }

    public function update(Request $request, $id){
      $rank_salary = $this->rank_salary->find($id);
      $rank_salary->rank = $request->input('rank');
      $rank_salary->up_salary = $request->input('up_salary');
      $rank_salary->save();
      return Redirect::route('rank_salary.index');
    }

    public function show($id){
      $rank_salary = $this->rank_salary->find($id);
      return view('rank_salary.show', compact('rank_salary'));
    }

    public function destroy($id){
      $rank_salary = $this->rank_salary->find($id);
      $rank_salary->delete();
      return Redirect::route('rank_salary.index');
    }
}
