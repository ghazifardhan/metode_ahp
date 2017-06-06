<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\V1\Models\Criteria;
use App\V1\Models\Alternative;
use App\V1\Models\DataAlternative;
use App\V1\Models\CriteriaComparison;
use App\V1\Models\RandomConsistencyIndex;
use App\V1\Models\RankSalary;

class AHPController extends Controller
{

    public function get_ahp_matrix_criteria(){
      $criteria = Criteria::orderBy('id', 'asc')->get();

      $criteria_ids = array();

      if(count($criteria) == 0){
        $matrix = null;
        $number_of_column = null;
        $sum = null;
        $norm_matrix = null;
        $number_of_row = null;
        $eigen_vektor = null;
        $sum_amaks = null;
        $t = null;
        $ci = null;
        $rci = null;
        $consistency = null;

        $res['t'] = null;
        $res['ci'] = null;
        $res['rci'] = null;
        $res['consistency'] = null;
      } else {
        foreach($criteria as $key => $val){
          $criteria_ids[] = $criteria[$key]['id'];
        }

        $matrix = $this->ahp_matrix_criteria($criteria_ids);
        $number_of_column = $this->ahp_number_of_column($criteria_ids, $matrix);
        $sum = $this->ahp_sum($criteria_ids, $number_of_column);
        $norm_matrix = $this->ahp_norm_matrix_criteria($criteria_ids, $matrix, $sum);
        $number_of_row = $this->ahp_number_of_row($criteria_ids, $norm_matrix);
        $eigen_vektor = $this->ahp_eigen_vektor($criteria_ids, $norm_matrix);
        $sum_amaks = $this->ahp_amaks($criteria_ids, $matrix, $eigen_vektor);
        $t = $this->ahp_t($criteria_ids, $sum_amaks, $eigen_vektor);
        $ci = $this->ahp_ci($criteria_ids, $t);
        $rci = $this->ahp_rci($criteria_ids);
        $consistency = $this->ahp_consitency($ci, $rci);

        $res['t'] = $t;
        $res['ci'] = $ci;
        $res['rci'] = $rci->index_value;
        $res['consistency'] = $consistency;
      }

      return view('ahp.index', compact('criteria', 'matrix', 'sum', 'norm_matrix', 'number_of_row', 'eigen_vektor', 'sum_amaks', 'res'));
      //return response(compact('criteria', 'matrix', 'sum', 'norm_matrix', 'number_of_row', 'eigen_vektor', 'sum_amaks', 'res'));
    }

    public function get_ahp_matrix_alternative(){
      $alternative = Alternative::orderBy('id', 'asc')->get();
      $criteria = Criteria::orderBy('id', 'asc')->get();

      $alternative_ids = array();
      if(count($alternative) == 0){
        $matrix = null;
        $alternative = null;
        $rank = null;
        $criteria = null;
        $eigen_vektor = null;
        $amaks = null;
      } else {
        foreach($alternative as $key => $val){
          $alternative_ids[] = $alternative[$key]['id'];
        }

        foreach ($criteria as $key => $value) {
          $criteria_ids[] = $criteria[$key]['id'];
          $data_alternative = DataAlternative::with('alternative')->orderBy('alternative_id','asc')->where('criteria_id',$criteria[$key]['id'])->get();
          $matrix[$key]['criteria_id'] = $criteria[$key]['id'];
          $matrix[$key]['criteria_name'] = $criteria[$key]['criteria'];
          $matrix[$key]['result'] = $this->ahp_matrix_alternative($alternative_ids, $data_alternative);
          $sum = $this->ahp_number_of_column($alternative_ids, $matrix[$key]['result']);
          $matrix[$key]['number_of_column'] = $this->ahp_sum($alternative_ids, $sum);
          $norm_matrix = $this->ahp_norm_matrix_criteria($alternative_ids, $matrix[$key]['result'], $matrix[$key]['number_of_column']);
          $matrix[$key]['norm_matrix'] = $norm_matrix;
          $eigen_vektor = $this->ahp_eigen_vektor_alternative($alternative_ids, $matrix[$key]['norm_matrix'], $alternative);
          //arsort($eigen_vektor);
          $matrix[$key]['eigen_vektor'] = $eigen_vektor;
          foreach($matrix[$key]['norm_matrix'] as $k => $v){
            $tests[$key][$k] = $matrix[$key]['norm_matrix'][$k][0];
          }
          $rank = $tests;
          //$test[] = $data_alternative;
        }


        $matrix_crit = $this->ahp_matrix_criteria($criteria_ids);
        $number_of_column = $this->ahp_number_of_column($criteria_ids, $matrix_crit);
        $sum = $this->ahp_sum($criteria_ids, $number_of_column);
        $norm_matrix = $this->ahp_norm_matrix_criteria($criteria_ids, $matrix_crit, $sum);
        $number_of_row = $this->ahp_number_of_row($criteria_ids, $norm_matrix);
        $eigen_vektor = $this->ahp_eigen_vektor($criteria_ids, $norm_matrix);
        $amaks = $this->ahp_amaks_alt($criteria_ids, $alternative_ids, $rank, $eigen_vektor, $alternative);
      }

      return view('ahp.index_alternative', compact('matrix','alternative', 'rank', 'criteria', 'eigen_vektor', 'amaks'));
      //return response(compact('matrix','alternative', 'rank', 'criteria', 'eigen_vektor', 'amaks'));
      //return response($amaks);
    }

    public function array_sort_by_column($amaks) {

    }

    public function ahp_matrix_criteria($criteria_id){
      for($x = 0; $x < count($criteria_id); $x++){
        for($y = 0; $y < count($criteria_id);$y++){
            if($x == $y){
              $matrix[$x][$y] = 1;
            } else {
              if($x < $y){
              $q = CriteriaComparison::with('criteria1', 'criteria2', 'importance_level')->where(
                ['criteria_id_1' => $criteria_id[$x],
                 'criteria_id_2' => $criteria_id[$y]
               ])->first();
               if(count($q) > 0){
                 $nilai = $q->importance_level->level_value;
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
    }

    public function ahp_number_of_column($criteria_id, $matrix){
      for($x = 0; $x < count($criteria_id); $x++){
        for($y = 0; $y < count($criteria_id); $y++){
          $number_of_column[$x][$y] = $matrix[$y][$x];
        }
      }
      return $number_of_column;
    }

    public function ahp_norm_matrix_criteria($criteria_id, $matrix, $sum){
      for($x = 0; $x < count($criteria_id); $x++){
        for($y = 0; $y < count($criteria_id); $y++){
          $norm_matrix[$x][$y] = round($matrix[$x][$y] / $sum[$y], config('app.decimal'));
        }
      }
      return $norm_matrix;
    }

    public function ahp_sum($criteria_id, $number_of_column){
      for($x = 0; $x < count($criteria_id); $x++){
        $sum[] = array_sum($number_of_column[$x]);
      }
      return $sum;
    }

    public function ahp_number_of_row($criteria_id, $norm_matrix){
      for($x = 0; $x < count($criteria_id); $x++){
          $number_of_row[] = array_sum($norm_matrix[$x]);
      }
      return $number_of_row;
    }

    public function ahp_eigen_vektor($criteria_id, $norm_matrix){
      for($x = 0; $x < count($criteria_id); $x++){
          $eigen_vektor[] = round(array_sum($norm_matrix[$x])/count($criteria_id), config('app.decimal'));
      }
      return $eigen_vektor;
    }

    public function ahp_eigen_vektor_alternative($criteria_id, $norm_matrix, $alternative){
      for($x = 0; $x < count($criteria_id); $x++){
          //$eigen_vektor[$x]['name'] = $alternative[$x]['alternative'];
          //$eigen_vektor[$x]['value'] = array_sum($norm_matrix[$x])/count($criteria_id);
          $eigen_vektor[$alternative[$x]['alternative']] = round(array_sum($norm_matrix[$x])/count($criteria_id), config('app.decimal'));
      }
      arsort($eigen_vektor);
      return $eigen_vektor;
    }

    public function ahp_amaks($criteria_id, $matrix, $eigen_vektor){
      for($x = 0; $x <  count($criteria_id); $x++){
        for($y = 0; $y < count($criteria_id); $y++){
          $amaks[$x][$y] = $matrix[$x][$y] * $eigen_vektor[$y];
        }
      }

      for($x = 0; $x <  count($criteria_id); $x++){
          $sum_amaks[] = array_sum($amaks[$x]);
      }
      return $sum_amaks;
    }

    public function ahp_amaks_alt($criteria_id, $alternative_id, $matrix, $eigen_vektor, $alternative){
      for($x = 0; $x <  count($alternative_id); $x++){
        for($y = 0; $y < count($criteria_id); $y++){
          $amaks[$x][$y] = $matrix[$y][$x] * $eigen_vektor[$y];
        }
      }

      for($x = 0; $x <  count($alternative_id); $x++){
          $sum_amaks[$x]['id'] = $alternative_id[$x];
          $sum_amaks[$x]['name'] = $alternative[$x]['alternative'];
          $sum_amaks[$x]['value'] = round(array_sum($amaks[$x]), config('app.decimal'));
      }

      $value = array();
      $rank = 1;
      foreach ($sum_amaks as $key => $row)
      {
          $value[$key]['value'] = $row['value'];
          $value[$key]['id'] = $row['id'];
          $value[$key]['name'] = $row['name'];
      }
      array_multisort($value, SORT_DESC, $sum_amaks);
      foreach ($value as $key => $row)
      {
          $value[$key]['rank'] = $rank++;
          $up_salary = RankSalary::where('rank', $value[$key]['rank'])->first();
          if($up_salary){
            $value[$key]['up_salary'] = $up_salary->up_salary;
          } else {
            $value[$key]['up_salary'] = 0;
          }

      }
      return $value;
    }

    public function ahp_t($criteria_id, $sum_amaks, $eigen_vektor){
      for($x = 0; $x < count($criteria_id); $x++){
        $t[] = $sum_amaks[$x] / $eigen_vektor[$x];
      }

      $sum_t = round(array_sum($t) / count($criteria_id), config('app.decimal'));

      return $sum_t;
    }

    public function ahp_ci($criteria_id, $sum_t){
      $ci = round(($sum_t - count($criteria_id))/(count($criteria_id) - 1), config('app.decimal'));

      return $ci;
    }

    public function ahp_rci($criteria_id){

      $index = count($criteria_id);

      $rci = RandomConsistencyIndex::where('total_index', $index)->first();

      return $rci;

    }

    public function ahp_consitency($ci, $rci){
      $value = round($ci / $rci->index_value, config('app.decimal'));
      if($value < 0.100){
        $res['value'] = $value;
        $res['consistency'] = true;
      } else {
        $res['value'] = $value;
        $res['consistency'] = false;
      }

      return $res;
    }

    public function ahp_matrix_alternative($alternative_ids, $data_alternative){
      for($x=0;$x<count($alternative_ids);$x++){
    		for($y=0;$y<count($alternative_ids);$y++){
    			$matrix[$x][$y] = round($data_alternative[$x]['value']/$data_alternative[$y]['value'],config('app.decimal'));
    		}
    	}
    	return $matrix;
    }
}
