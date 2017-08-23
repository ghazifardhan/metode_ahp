<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use App\V1\Models\Criteria;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Auth;

class CriteriaController extends Controller
{
  private $criteria;

  public function __construct(){
    $this->criteria = new Criteria();
    $this->middleware('auth');
  }

  public function index(){
    $criteria = $this->criteria->all();
    $res['result'] = $criteria;
    $title = 'Daftar Criteria';
    return view('criteria.index', compact('criteria', 'title'));
  }

  public function store(Request $request){
    Validator::validate($request->input(), $this->criteria->validate);
    $this->criteria->fill([
      'kriteria' => $request->input('kriteria'),
      'created_by' => Auth::id(),
      'updated_by' => Auth::id(),
    ]);
    $this->criteria->save();
    return Redirect::route('criteria.index');
  }

  public function create(){
    $res['create'] = true;
    $res['status'] = 'Create New';
    $criteria = null;
    $title = 'Add Criteria Comparison';
    return view('criteria.form', compact('res', 'criteria', 'title'));
  }

  public function edit($id){
    $criteria = $this->criteria->find($id);
    $res['create'] = false;
    $res['status'] = 'Update';
    $title = 'Edit Criteria - ' . $criteria->criteria;
    return view('criteria.form', compact('criteria', 'res', 'title'));
  }

  public function update(Request $request, $id){
    $criteria = $this->criteria->find($id);
    $criteria->kriteria = $request->input('kriteria');
    $criteria->updated_by = Auth::id();
    $criteria->save();
    return Redirect::route('criteria.index');
  }

  public function show($id){
    $criteria = $this->criteria->find($id);
    $title = $criteria->kriteria;
    return view('criteria.show', compact('criteria', 'title'));
  }

  public function destroy($id){
    $criteria = $this->criteria->find($id);
    $criteria->delete();
    return Redirect::route('criteria.index');
  }
}
