@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @foreach($matrix as $key => $val)
                    <table class="table table-bordered">
                      <tr>
                        <th colspan="{{ count($alternative)+1 }}">{{ $matrix[$key]['criteria_name'] }}</th>
                      </tr>
                      <tr>
                        <td>{{ $matrix[$key]['criteria_name'] }}</td>
                        @foreach($alternative as $items)
                        <td>{{ $items->alternative }}</td>
                        @endforeach
                      </tr>
                      @foreach($alternative as $x => $y)
                      <tr>
                      <td>{{ $alternative[$x]['alternative'] }}</td>
                      @foreach($matrix[$key]['result'] as $k => $v)
                          <td>{{ $matrix[$key]['result'][$x][$k] }}</td>
                      @endforeach
                      </tr>
                      @endforeach
                      <tr>
                        <td>Total</td>
                        @foreach($matrix[$key]['number_of_column'] as $k => $v)
                        <td>{{ $v }}</td>
                        @endforeach
                      </tr>
                    </table>

                    <table class="table table-bordered">
                      <tr>
                        <th colspan="{{ count($alternative)+2 }}">Normalisasi {{ $matrix[$key]['criteria_name'] }}</th>
                      </tr>
                      <tr>
                        <td>{{ $matrix[$key]['criteria_name'] }}</td>
                        @foreach($alternative as $items)
                        <td>{{ $items->alternative }}</td>
                        @endforeach
                      </tr>
                      @foreach($alternative as $x => $y)
                      <tr>
                        <td>{{ $alternative[$x]['alternative'] }}</td>
                        @foreach($matrix[$key]['norm_matrix'] as $k => $v)
                            <td>{{ $matrix[$key]['norm_matrix'][$x][$k] }}</td>
                        @endforeach
                      </tr>
                      @endforeach
                    </table>

                    <table class="table table-bordered">
                      <tr>
                        <th colspan="{{ count($alternative)+1 }}">Ranking {{ $matrix[$key]['criteria_name'] }}</th>
                      </tr>
                      <tr>
                        <td>No</td>
                        <td>Alternative</td>
                        <td>Values</td>
                      </tr>
                      <?php $no = 1; ?>
                      @foreach($matrix[$key]['eigen_vektor'] as $key => $val)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $key }}</td>
                        <td>{{ $val }}</td>
                      </tr>
                      @endforeach
                    </table>
                    @endforeach
                    <table class="table table-bordered">
                      <tr>
                        <th>*</th>
                          @foreach($criteria as $items)
                          <th>{{ $items->criteria }}</th>
                          @endforeach
                        </tr>
                        <tr>
                            <td>Eigen Vektor</td>
                            @foreach($eigen_vektor as $row)
                            <td>{{ $row }}</td>
                            @endforeach
                        </tr>
                        @foreach($alternative as $x => $v)
                        <tr>
                          <td>{{$v->alternative}}</td>
                          @foreach($rank as $y => $val)
                          <td>{{ $rank[$y][$x] }}</td>
                          @endforeach
                        </tr>
                        @endforeach
                      </table>

                    <table class="table table-bordered">
                      <tr>
                        <th colspan="3">Rank Summary</th>
                      </tr>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Value</th>
                      </tr>
                      @foreach($amaks as $key => $items)
                      <tr>
                        <td>{{ $amaks[$key]['rank'] }}</td>
                        <td>{{ $amaks[$key]['name'] }}</td>
                        <td>{{ $amaks[$key]['value'] }}</td>
                      </tr>
                      @endforeach
                      </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
