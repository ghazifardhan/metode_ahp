<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\V1\Models\Division;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Auth;

class DivisionController extends Controller
{
    var $division;

    public function __construct(){
      $this->division = new Division();
    }

    public function index(){
      $division = $this->division->all();
      $title = 'Daftar Division';
      return view('division.index', compact('division', 'title'));
      //return response($division);
    }

    public function create(){
      $res['create'] = true;
      $res['status'] = 'Create New';
      $division = null;
      $title = 'Add Division';
      return view('division.form', compact('res', 'division', 'title'));
    }

    public function store(Request $request){
      Validator::validate($request->input(), $this->division->validate);
      $this->division->fill([
          'nama' => $request->input('nama'),
          'created_by' => Auth::id(),
          'updated_by' => Auth::id(),
        ]);
      if($this->division->save()){
        $res['success'] = true;
        $res['result'] = 'Success add division';
        return Redirect::route('division.index');
      } else {
        $res['success'] = false;
        $res['result'] = 'Failed add division';
        $title = 'Daftar Division';
        return view('division.form', compact('res', 'title'));
      }
    }

    public function edit($id){
      $res['create'] = false;
      $res['status'] = 'Update';
      $division = $this->division->find($id);
      $title = 'Edit Division - ' . $division->nama;
      return view('division.form', compact('division', 'res', 'title'));
    }

    public function update(Request $request, $id){
      $division = $this->division->find($id);
      $division->nama = $request->input('nama');
      $division->updated_by = Auth::id();
      $division->save();
      return Redirect::route('division.index');
    }

    public function destroy($id){
      $division = $this->division->find($id);
      $division->delete();
      return Redirect::route('division.index');
    }
}
