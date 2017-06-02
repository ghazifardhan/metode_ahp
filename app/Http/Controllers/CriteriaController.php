<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use App\V1\Models\Criteria;
use Redirect;

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
    return view('criteria.index', compact('criteria'));
  }

  public function store(Request $request){
    $this->criteria->fill([
      'criteria' => $request->input('criteria'),
    ]);
    $this->criteria->save();
    return Redirect::route('criteria.index');
  }

  public function create(){
    $res['create'] = true;
    $res['status'] = 'Create New';
    $criteria = null;
    return view('criteria.form', compact('res', 'criteria'));
  }

  public function edit($id){
    $criteria = $this->criteria->find($id);
    $res['create'] = false;
    $res['status'] = 'Update';
    return view('criteria.form', compact('criteria', 'res'));
  }

  public function update(Request $request, $id){
    $criteria = $this->criteria->find($id);
    $criteria->criteria = $request->input('criteria');
    $criteria->save();
    return Redirect::route('criteria.index');
  }

  public function show($id){
    $criteria = $this->criteria->find($id);
    return view('criteria.show', compact('criteria'));
  }

  public function destroy($id){
    $criteria = $this->criteria->find($id);
    $criteria->delete();
    return Redirect::route('criteria.index');
  }
}
