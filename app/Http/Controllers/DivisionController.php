<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\V1\Models\Division;
use Redirect;

class DivisionController extends Controller
{
    var $division;

    public function __construct(){
      $this->division = new Division();
    }

    public function index(){
      $division = $this->division->all();
      return view('division.index', compact('division'));
      //return response($division);
    }

    public function create(){
      return view('division.form');
    }

    public function store(Request $request){
      $this->division->fill([
          'name' => $request->input('name'),
        ]);
      if($this->division->save()){
        $res['success'] = true;
        $res['result'] = 'Success add division';
        return Redirect::route('division.index');
      } else {
        $res['success'] = false;
        $res['result'] = 'Failed add division';
        return view('division.form', compact('res'));
      }
    }

    public function edit($id){
      $division = $this->division->find($id);
      return view('division.form_update', compact('division'));
    }

    public function update(Request $request, $id){
      $division = $this->division->find($id);
      $division->name = $request->input('name');
      return Redirect::route('division.index');
    }

    public function destroy($id){
      $division = $this->division->find($id);
      $division->delete();
      return Redirect::route('division.index');
    }
}
