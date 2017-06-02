<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\V1\Models\Alternative;
use App\V1\Models\DataAlternative;
use App\V1\Models\Criteria;
use App\V1\Models\Division;
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
        'age' => $request->input('age'),
        'address' => $request->input('address'),
        'phone_number' => $request->input('phone_number'),
        'salary' => $request->input('salary'),
        'division_id' => $request->input('division_id'),
      ]);
      $this->alternative->save();
      return Redirect::route('alternative.index');
    }

    public function create(){
      $division = Division::all();
      $res['create'] = true;
      $res['status'] = "Create New";
      $alternative = null;
    	return view('alternative.form', compact('division', 'alternative', 'res'));
    }

    public function edit($id){
      $alternative = $this->alternative->find($id);
      $division = Division::all();
      $res['create'] = false;
      $res['status'] = "Update";
      return view('alternative.form', compact('alternative', 'division', 'res'));
    }

    public function update(Request $request, $id){
      $alternative = $this->alternative->find($id);
      $alternative->alternative = $request->input('alternative');
      $alternative->age = $request->input('age');
      $alternative->address = $request->input('address');
      $alternative->phone_number = $request->input('phone_number');
      $alternative->salary = $request->input('salary');
      $alternative->division_id = $request->input('division_id');
      $alternative->save();
      return Redirect::route('alternative.index');
    }

    public function show($id){
      $alternative = $this->alternative->with('division')->find($id);
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
        if($value[$x] == null){
          $value[$x] = 0;
        }
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
