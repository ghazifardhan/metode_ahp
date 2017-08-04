<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use App\V1\Models\CriteriaComparison;
use App\V1\Models\Criteria;
use App\V1\Models\ImportanceLevel;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Auth;

class CriteriaComparisonController extends Controller
{
  private $criteria_comparison;

  public function __construct(){
    $this->criteria_comparison = new CriteriaComparison();
    $this->middleware('auth');
  }

  public function index(){
    $criteria_comparison = $this->criteria_comparison->with('criteria1', 'criteria2', 'importance_level')->get();
    $res['result'] = $criteria_comparison;
    $title = 'Daftar Criteria Comparison';
    return view('criteria_comparison.index', compact('criteria_comparison', 'title'));
    //return response($res);
  }

  public function store(Request $request){

    Validator::validate($request->input(), $this->criteria_comparison->validate);

    $this->criteria_comparison->fill([
      'criteria_id_1' => $request->input('criteria_id_1'),
      'criteria_id_2' => $request->input('criteria_id_2'),
      'importance_leve_id' => $request->input('importance_leve_id'),
      'created_by' => Auth::id(),
      'updated_by' => Auth::id(),
    ]);
    $this->criteria_comparison->save();
    return Redirect::route('criteria_comparison.index');
  }

  public function create(){
    $criteria = Criteria::all();
    $importance_level = ImportanceLevel::all();
    $res['create'] = true;
    $res['status'] = "Create New";
    $criteria_comparison = null;
    $title = 'Add Criteria Comparison';
    return view('criteria_comparison.form', compact('criteria', 'importance_level', 'res', 'criteria_comparison', 'title'));
  }

  public function edit($id){
    $criteria_comparison = $this->criteria_comparison->find($id);
    $res['create'] = false;
    $res['status'] = "Update";
    $criteria = Criteria::all();
    $importance_level = ImportanceLevel::all();
    $title = 'Edit Criteria Comparison';
    return view('criteria_comparison.form', compact('criteria_comparison', 'criteria', 'importance_level', 'res', 'title'));
  }

  public function update(Request $request, $id){
    $criteria_comparison = $this->criteria_comparison->find($id);
    $criteria_comparison->criteria_id_1 = $request->input('criteria_id_1');
    $criteria_comparison->criteria_id_2 = $request->input('criteria_id_2');
    $criteria_comparison->importance_leve_id = $request->input('importance_leve_id');
    $criteria_comparison->updated_by = Auth::id();
    $criteria_comparison->save();
    return Redirect::route('criteria_comparison.index');
  }

  public function show($id){
    $criteria_comparison = $this->criteria_comparison->find($id);
    $title = 'Show Criteria Comparison';
    return view('criteria_comparison.show', compact('criteria_comparison', 'title'));
  }

  public function destroy($id){
    $criteria_comparison = $this->criteria_comparison->find($id);
    $criteria_comparison->delete();
    return Redirect::route('criteria_comparison.index');
  }
}
