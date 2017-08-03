@extends('layouts.app')
@section('breadcrumb')
@include('breadcrumb')
@stop
@section('style')

<style>

table {
  border: 1px solid #f4f4f4;
  border-collapse: collapse;
  border-spacing: 10px;
  padding: 10px;
}

.mytable {
  width: 100%;
  margin-bottom: 22px;
}

th, td {
    padding: 10px;
    text-align: left;
}

</style>

@stop  
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">Pairwise Comparison <input id="not-print" type="button" class="btn btn-info" style="float: right;" onclick="javascript:window.print();" value="Print"></div>

                <div class="panel-body">
                  <?php if(!$matrix){ ?>
                    <h1 align="center">Tidak ada data</h1>
                    <?php } else { ?>
                    <table border="1" class="mytable">
                      <tr>
                        <th colspan="{{ count($criteria)+1 }}">Pairwise Comparison</th>
                      </tr>
                      <tr>
                        <td class="col-md-1"><b>Criteria</b></td>
                        @foreach($criteria as $row)
                        <td class="col-md-1">{{ $row->criteria }}</td>
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
                      <table class="mytable" border="1">
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

                        <table class="mytable" border="1">
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
</div>
@endsection
