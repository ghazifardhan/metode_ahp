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
                <div class="panel-heading">Assessment Summary {{ $year_assessment->year }}</div>
                <div id="data-print" class="panel-body">
                @foreach($div as $key => $val)
                <table class="table table-bordered table-hover table-striped table-condensed">
                  <tr>
                    <th colspan="2">Division {{ $div[$key]['name'] }}</th>
                  </tr>
                  <tr>
                    <th>Rank</th>
                    <th>Nama Karyawan</th>
                  </tr>
                @php $rank = 1 @endphp
                @foreach($assessment_sum as $k => $v)
                @if($div[$key]['id'] == $assessment_sum[$k]['alternative']['division_id'])
                <tr>
                <td>{{ $rank++ }}</td>
                <td>{{ $assessment_sum[$k]['alternative']['alternative'] }}</td>
                </tr>
                @endif
                @endforeach
                </table>
                @endforeach
                <div style="text-align: center;">
                  <button id="not-print-btn" class="btn btn-info" style="align-self: center;" onclick="javascript:window.print();">Print <i class="fa fa-print"></i></button>
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
    });
</script>
@endsection
