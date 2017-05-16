<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\V1\Models\Alternative;
use App\V1\Models\DataAlternative;
use App\V1\Models\Criteria;
use Redirect;

class AlternativeController extends BaseController
{
    private $alternative;

    public function __construct(){
      $this->alternative = new Alternative();
      $this->middleware('auth');
    }

    public function index(){
      $alternative = $this->alternative->all();
      $res['result'] = $alternative;
      return view('alternative.index', compact('alternative'));
    }

    public function store(Request $request){
      $this->alternative->fill([
        'alternative' => $request->input('alternative'),
      ]);
      $this->alternative->save();
      return Redirect::route('alternative.index');
    }

    public function create(){
    	return view('alternative.form');
    }

    public function edit($id){
      $alternative = $this->alternative->find($id);
      return view('alternative.form_update', compact('alternative'));
    }

    public function update(Request $request, $id){
      $alternative = $this->alternative->find($id);
      $alternative->alternative = $request->input('alternative');
      $alternative->save();
      return Redirect::route('alternative.index');
    }

    public function show($id){
      $alternative = $this->alternative->find($id);
      $criteria = Criteria::orderBy('id', 'asc')->get();
      $data_alternative = DataAlternative::where('alternative_id', $alternative->id)->orderBy('criteria_id', 'asc')->get();

      if(count($data_alternative) == 0){
        return view('alternative.show', compact('alternative', 'criteria'));
      } else {
        return view('alternative.show_update', compact('alternative', 'criteria', 'data_alternative'));
      }
    }

    public function destroy($id){
      $alternative = $this->alternative->find($id);
      $alternative->delete();
      return Redirect::route('alternative.index');
    }

    public function test(Request $request){

      date_default_timezone_set('Asia/Jakarta');
      $time = date('Y-m-d H:i:s');

      $value = $request->input('value');
      $alternative_id = $request->input('alternative_id');
      $criteria_id = $request->input('criteria_id');

      for($x = 0; $x < count($value); $x++){
        DB::table('data_alternative')->insert([
          'alternative_id' => $alternative_id,
          'criteria_id' => $criteria_id[$x],
          'value' => $value[$x],
          'created_at' => $time,
          'updated_at' => $time,
        ]);
      }

      return Redirect::route('alternative.index');
    }

    public function test_update(Request $request){

      //echo json_encode($request->input());

      date_default_timezone_set('Asia/Jakarta');
      $time = date('Y-m-d H:i:s');

      $value = $request->input('value');
      $alternative_id = $request->input('alternative_id');
      $criteria_id = $request->input('criteria_id');

      for($x = 0; $x < count($value); $x++){
        DB::table('data_alternative')->where(['alternative_id' => $alternative_id, 'criteria_id' => $criteria_id[$x]])->update([
          'value' => $value[$x],
          'updated_at' => $time,
        ]);
      }

      return Redirect::route('alternative.index');

    }
}
