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
use App\V1\Models\Year;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Auth;

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
      $title = 'Daftar Karyawan';
      return view('alternative.index', compact('alternative', 'title'));
    }

    public function store(Request $request){

      Validator::validate($request->input(), $this->alternative->validate);
      $this->alternative->fill([
        'calon' => $request->input('calon'),
        'tanggal_lahir' => date('Y-m-d', strtotime($request->input('tanggal_lahir'))),
        'alamat' => $request->input('alamat'),
        'nomor_hp' => $request->input('nomor_hp'),
        'gaji' => $request->input('gaji'),
        'divisi_id' => $request->input('divisi_id'),
        'created_by' => Auth::id(),
        'updated_by' => Auth::id(),
      ]);
      $this->alternative->save();
      return Redirect::route('alternative.index');
    }

    public function create(){
      $division = Division::all();
      $res['create'] = true;
      $res['status'] = "Create New";
      $alternative = null;
      $title = 'Add Karyawan';
    	return view('alternative.form', compact('division', 'alternative', 'res', 'title'));
    }

    public function edit($id){
      $alternative = $this->alternative->find($id);
      //$alternative = $this->alternative->where('alternative', $slug)->first();
      //dd($slug);
      $division = Division::all();
      $res['create'] = false;
      $res['status'] = "Update";
      $title = 'Edit Karyawan - ' . $alternative->calon;
      return view('alternative.form', compact('alternative', 'division', 'res', 'title'));
    }

    public function update(Request $request, $id){
      $alternative = $this->alternative->find($id);
      $alternative->calon = $request->input('calon');
      $alternative->tanggal_lahir = date('Y-m-d', strtotime($request->input('tanggal_lahir')));
      $alternative->alamat = $request->input('alamat');
      $alternative->nomor_hp = $request->input('nomor_hp');
      $alternative->gaji = $request->input('gaji');
      $alternative->divisi_id = $request->input('divisi_id');
      $alternative->updated_by = Auth::id();
      $alternative->save();
      return Redirect::route('alternative.index');
    }

    public function show($id){
      $alternative = $this->alternative->with('division')->find($id);
      $criteria = Criteria::orderBy('id', 'asc')->get();
      $data_alternative = DataAlternative::where('calon_id', $alternative->id)->orderBy('kriteria_id', 'asc')->get();
      $year = Year::orderBy('tahun', 'asc')->get();
      $title = $alternative->calon;
      return view('alternative.show', compact('alternative', 'criteria', 'year', 'title'));
    }

    public function showAssessmentForm($id, $year_id){
      $alternative = $this->alternative->with('division')->find($id);
      $criteria = Criteria::orderBy('id', 'asc')->get();
      $data_alternative = DataAlternative::where(['calon_id' => $alternative->id, 'tahun_id' => $year_id])->orderBy('kriteria_id', 'asc')->get();
      $title = 'Assessment - ' . $alternative->calon;
      $year = Year::find($year_id);
      if(count($data_alternative) == 0){
        return view('alternative.assessment.form', compact('alternative', 'criteria', 'year', 'title'));
      } else {
        return view('alternative.assessment.form_update', compact('alternative', 'criteria', 'data_alternative', 'year', 'title'));
      }
    }

    public function destroy($id){
      $alternative = $this->alternative->find($id);
      $alternative->delete();
      return Redirect::route('alternative.index');
    }

    public function createAssessment(Request $request, $id, $year_id){
      date_default_timezone_set('Asia/Jakarta');
      $time = date('Y-m-d H:i:s');

      $value = $request->input('value');
      $alternative_id = $request->input('alternative_id');
      $criteria_id = $request->input('criteria_id');

      for($x = 0; $x < count($value); $x++){
        if($value[$x] == null){
          $value[$x] = 0;
        }
        DB::table('data_calon')->insert([
          'calon_id' => $alternative_id,
          'kriteria_id' => $criteria_id[$x],
          'nilai' => $value[$x],
          'tahun_id' => $year_id,
          'created_at' => $time,
          'updated_at' => $time,
          'created_by' => Auth::id(),
          'updated_by' => Auth::id(),
        ]);
      }

      return Redirect::route('alternative.show', $alternative_id);
    }

    public function updateAssessment(Request $request, $id, $year_id){

      //echo json_encode($request->input());

      date_default_timezone_set('Asia/Jakarta');
      $time = date('Y-m-d H:i:s');

      $value = $request->input('value');
      $alternative_id = $request->input('alternative_id');
      $criteria_id = $request->input('criteria_id');

      for($x = 0; $x < count($value); $x++){
        DB::table('data_calon')->where(['calon_id' => $alternative_id, 'kriteria_id' => $criteria_id[$x], 'tahun_id' => $year_id])->update([
          'nilai' => $value[$x],
          'updated_at' => $time,
        ]);
      }

      return Redirect::route('alternative.show', $alternative_id);

    }
}
