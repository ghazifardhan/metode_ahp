<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\V1\Models\Year;
use Redirect;
use Validator;

class YearController extends Controller
{
    var $year;

    public function __construct(){
      $this->year = new Year();
      $this->middleware('auth');
    }

    public function index(){
      $year = $this->year->all();
      return view('year.index', compact('year'));
    }

    public function store(Request $request){
      Validator::validate($request->input(), $this->year->validate);
      $this->year->fill([
        'year' => $request->input('year'),
      ]);
      $this->year->save();
      return Redirect::route('year.index');
    }

    public function create(){
      $res['create'] = true;
      $res['status'] = "Create New";
      $year = null;
      return view('year.form', compact('year', 'res'));
    }

    public function edit($id){
      $year = $this->year->find($id);
      $res['create'] = false;
      $res['status'] = "Update";
      return view('year.form', compact('year', 'res'));
    }

    public function update(Request $request, $id){
      $year = $this->year->find($id);
      $year->year = $request->input('year');
      $year->save();
      return Redirect::route('year.index');
    }

    public function show($id){
      $year = $this->year->find($id);
      return view('year.show', compact('year'));
    }

    public function destroy($id){
      $year = $this->year->find($id);
      $year->delete();
      return Redirect::route('year.index');
    }
}
