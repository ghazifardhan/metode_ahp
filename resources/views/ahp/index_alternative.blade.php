@extends('layouts.app')
@section('title')
{{ $title }}
@stop
@section('breadcrumb')
{!! Breadcrumbs::render('ahp_summary', $year_assessment) !!}
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Summary <input id="not-print" type="button" class="btn btn-info" style="float: right;" onclick="javascript:window.print();" value="Print"></div>

                <div id="data-print" class="panel-body">
                <?php if($matrix == null){ ?>
                  <h1 align="center">Tidak ada data</h1>
                <?php } else { ?>
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
                        <th colspan="4">Rank Summary</th>
                      </tr>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Upgrade Salary</th>
                      </tr>
                      @foreach($amaks as $key => $items)
                      <tr>
                        <td>{{ $amaks[$key]['rank'] }}</td>
                        <td>{{ $amaks[$key]['name'] }}</td>
                        <td>{{ $amaks[$key]['value'] }}</td>
                        <td>{{ "Rp " . number_format($amaks[$key]['up_salary'], "0", ",", ".") }}</td>
                      </tr>
                      @endforeach
                    </table>

                    @foreach($matrix as $key => $val)
                    <table class="table table-bordered">
                      <tr>
                        <th colspan="{{ count($alternative)+1 }}">Ranking {{ $matrix[$key]['criteria_name'] }}</th>
                      </tr>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Values</th>
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
                    <?php } ?>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
<script>
    $('#cetak').on('click', function(){
      $('#data-print').printArea();
      console.log("testetststeajhw");
    });
</script>
@endsection
