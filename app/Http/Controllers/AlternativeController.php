<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use App\V1\Models\Alternative;
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
      return view('alternative.show', compact('alternative'));
    }

    public function destroy($id){
      $alternative = $this->alternative->find($id);
      $alternative->delete();
      return Redirect::route('alternative.index');
    }
}
