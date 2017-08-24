<?php

use Illuminate\Http\Request;
use App\V1\Models\CriteriaComparison;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test_gan', function($criteria_id = array(1,2,3,4,5)){
    for($x = 0; $x < count($criteria_id); $x++){
        for($y = 0; $y < count($criteria_id);$y++){
            if($x == $y){
            $matrix[$x][$y] = 1;
            } else {
            if($x < $y){
            $q = CriteriaComparison::with('criteria1', 'criteria2', 'importance_level')->where(
                ['kriteria_id_1' => $criteria_id[$x],
                'kriteria_id_2' => $criteria_id[$y]
                ])->first();
                if(count($q) > 0){
                $nilai = $q->importance_level->nilai_tingkat;
                $matrix[$x][$y] = round($nilai, config('app.decimal'));
                $matrix[$y][$x] = round((1/$nilai),config('app.decimal'));
                } else {
                $matrix[$x][$y] = 1;
                $matrix[$y][$x] = 1;
                }
                }
            }
            }
    }
    return $matrix;
});
