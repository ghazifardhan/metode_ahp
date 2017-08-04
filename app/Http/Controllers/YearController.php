<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\V1\Models\Year;
use App\V1\Models\Alternative;
use App\V1\Models\DataAlternative;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Auth;

class YearController extends Controller
{
    var $year;

    public function __construct(){
      $this->year = new Year();
      $this->middleware('auth');
    }

    public function index(){
      $year = $this->year->all();
      $title = 'Daftar Year Assessment';
      return view('year.index', compact('year', 'title'));
    }

    public function store(Request $request){
      Validator::validate($request->input(), $this->year->validate);
      $this->year->fill([
        'year' => $request->input('year'),
        'created_by' => Auth::id(),
        'updated_by' => Auth::id(),
      ]);
      $this->year->save();
      return Redirect::route('year.index');
    }

    public function create(){
      $res['create'] = true;
      $res['status'] = "Create New";
      $year = null;
      $title = 'Add Year Assessment';
      return view('year.form', compact('year', 'res', 'title'));
    }

    public function edit($id){
      $year = $this->year->find($id);
      $res['create'] = false;
      $res['status'] = "Update";
      $title = 'Edit Year Assessment - ' . $year->year;
      return view('year.form', compact('year', 'res', 'title'));
    }

    public function update(Request $request, $id){
      $year = $this->year->find($id);
      $year->year = $request->input('year');
      $year->updated_by = Auth::id();
      $year->save();
      return Redirect::route('year.index');
    }

    public function show($id){
      $year = $this->year->find($id);
      $title = $year->year;
      return view('year.show', compact('year', 'title'));
    }

    public function destroy($id){
      $year = $this->year->find($id);
      $year->delete();
      return Redirect::route('year.index');
    }
}
