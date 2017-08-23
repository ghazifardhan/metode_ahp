<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\V1\Models\RankSalary;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Auth;


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
      $title = 'Daftar Rank Salary';
      return view('rank_salary.index', compact('rank_salary', 'title'));
    }

    public function store(Request $request){
      Validator::validate($request->input(), $this->rank_salary->validate);
      $this->rank_salary->fill([
        'peringkat' => $request->input('peringkat'),
        'kenaikan_gaji' => $request->input('kenaikan_gaji'),
        'created_by' => Auth::id(),
        'updated_by' => Auth::id(),
      ]);
      $this->rank_salary->save();
      return Redirect::route('rank_salary.index');
    }

    public function create(){
      $res['create'] = true;
      $res['status'] = "Create New";
      $rank_salary = null;
      $title = 'Add Rank Salary';
      return view('rank_salary.form', compact('rank_salary', 'res', 'title'));
    }

    public function edit($id){
      $rank_salary = $this->rank_salary->find($id);
      $res['create'] = false;
      $res['status'] = "Update";
      $title = 'Edit Rank Salary - ' . $rank_salary->rank;
      return view('rank_salary.form', compact('rank_salary', 'res', 'title'));
    }

    public function update(Request $request, $id){
      $rank_salary = $this->rank_salary->find($id);
      $rank_salary->peringkat = $request->input('peringkat');
      $rank_salary->kenaikan_gaji = $request->input('kenaikan_gaji');
      $rank_salary->updated_by = Auth::id();
      $rank_salary->save();
      return Redirect::route('rank_salary.index');
    }

    public function show($id){
      $rank_salary = $this->rank_salary->find($id);
      $title = $rank_salary->peringkat;
      return view('rank_salary.show', compact('rank_salary', 'title'));
    }

    public function destroy($id){
      $rank_salary = $this->rank_salary->find($id);
      $rank_salary->delete();
      return Redirect::route('rank_salary.index');
    }
}
