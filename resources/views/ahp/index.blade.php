@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">AHP <input id="not-print" type="button" class="btn btn-info" style="float: right;" onclick="javascript:window.print();" value="Print"></div>

                <div class="panel-body">
                  <?php if(!$matrix){ ?>
                    <h1 align="center">Tidak ada data</h1>
                    <?php } else { ?>
                    <table class="table table-bordered">
                      <tr>
                        <th colspan="{{ count($criteria)+1 }}">Pairwise Comparison</th>
                      </tr>
                      <tr>
                        <td><b>Criteria</b></td>
                        @foreach($criteria as $row)
                        <td>{{ $row->criteria }}</td>
                        @endforeach
                        @foreach($criteria as $key => $val)
                        <tr>
                        <td>{{ $criteria[$key]['criteria'] }}</td>
                        @foreach($matrix as $k => $v)
                        <td>{{ $matrix[$key][$k] }}</td>
                        @endforeach
                        </tr>
                        @endforeach
                        <tr>
                          <td>Jumlah Kolom</td>
                          @foreach($criteria as $key => $val)
                          <td>{{ $sum[$key]  }}</td>
                          @endforeach
                        </tr>
                      </table>
                      <table class="table table-bordered">
                        <tr>
                          <th colspan="{{ count($criteria)+4 }}">Normalisasi Matriks</th>
                        </tr>
                        <tr>
                          <td><b>Criteria</b></td>
                          @foreach($criteria as $row)
                          <td>{{ $row->criteria }}</td>
                          @endforeach
                          <td>Jumlah Baris</td>
                          <td>Eigen Vektor</td>
                          <td>A-maks</td>
                          @foreach($criteria as $key => $val)
                          <tr>
                          <td>{{ $criteria[$key]['criteria'] }}</td>
                          @foreach($norm_matrix as $k => $v)
                          <td>{{ $norm_matrix[$key][$k] }}</td>
                          <?php $jumlah_kolom_norm[$k][$key] = $norm_matrix[$key][$k]; ?>
                          @endforeach
                          <td>{{ $number_of_row[$key] }}</td>
                          <td>{{ $eigen_vektor[$key] }}</td>
                          <td>{{ $sum_amaks[$key] }}</td>
                          </tr>
                          @endforeach
                        </table>

                        <table class="table table-bordered">
                          <tr>
                            <td>t</td>
                            <td>{{ $res['t'] }}</td>
                          </tr>
                          <tr>
                            <td>CI</td>
                            <td>{{ $res['ci'] }}</td>
                          </tr>
                          <tr>
                            <td>Random Index</td>
                            <td>{{ $res['rci'] }}</td>
                          </tr>
                          <tr>
                              <td colspan="2"><b>Consistency</b></td>
                          </tr>
                          <tr>
                              <td>Value</td>
                              <td>{{ $res['consistency']['value'] }}</td>
                          </tr>
                          <tr>
                              <td>Consistency</td>
                              <td><?php if($res['consistency']['consistency']){ echo 'Konsisten'; } else { echo 'Tidak Konsisten';} ?></td>
                          </tr>
                        </table>
                        <?php } ?>
                </div>
            </div>
    </div>
</div>
@endsection
