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
                <?php if($matrix == null){ ?>
                  <h1 align="center">Tidak ada data</h1>
                <?php } else { ?>
                    <table class="table table-bordered">
                      <tr>
                        <th colspan="6">Rank Summary</th>
                      </tr>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Grade</th>
                      </tr>
                      @php $no = 1 @endphp
                      @foreach($assessment_sum as $item)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->alternative->calon }}</td>
                        <td>{{ $item->grade }}</td>
                      </tr>
                      @endforeach
                    </table>
                    <?php } ?>

                    <div style="text-align: center;">
                      <button id="not-print-btn" class="btn btn-info" style="align-self: center;" onclick="javascript:window.print();">Print <i class="fa fa-print"></i></button>
                    </div>
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
