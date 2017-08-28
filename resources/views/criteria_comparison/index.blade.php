@extends('layouts.app')
@section('title')
{{ $title }}
@stop
@section('breadcrumb')
{!! Breadcrumbs::render('criteria_comparison') !!}
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="table table-bordered table-hover table-striped table-condensed">
                      <tr>
                        <th>No</th>
                        <th>Criteria ID 1</th>
                        <th>Value</th>
                        <th>Criteria ID 2</th>
                        <th>Action</th>
                      </tr>
                      <?php if(count($criteria_comparison) == 0){ ?>
                      <tr>
                        <td colspan="5">Tidak ada Data</td>
                      </tr>
                      <?php } else { ?>
                      <?php $no = 1; ?>
                      @foreach($criteria_comparison as $row)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->criteria1->kriteria }}</td>
                        <td>{{ $row->importance_level->nama_tingkat . " - " . $row->importance_level->nilai_tingkat }}</td>
                        <td>{{ $row->criteria2->kriteria }}</td>
                        <td>
                          {!! link_to_route('criteria_comparison.edit', 'Edit', array($row->id), array('class' => 'btn btn-info')) !!}

                          <button class="btn btn-danger delete" data-id="{{ $row->id }}" data-token="{{ csrf_token() }}">Delete</button>
                        </td>
                      </tr>
                      @endforeach
                      <?php } ?>
                    </table>
                    <a class="btn btn-info" href="{{ route('criteria_comparison.create') }}">Create New Comparison</a>
                    <!--
                    <a class="btn btn-info" href="{{ url('ahp') }}" data-toggle="modal" data-target="#modal-default">Check Consistency</a>
                    -->
                    <button class="btn btn-default check-cons" style="float: right" data-toggle="modal" data-target="#modal-default">Check Consistency</button>

                    <div class="modal fade" id="modal-default">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Consistency</h4>
                          </div>
                          <div class="modal-body">
                            <p class="cons-status"></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
<script>

  $('.delete').on('click', function(){
    var id = $(this).data('id');
    var token = $(this).data('token');
    $.ajax({
      url: 'criteria_comparison/' + id,
      type: 'POST',
      data: {'_method': 'DELETE', '_token':token},
      success: function(){
        console.log('Success Delete!');
        window.location.href = "{{ url('criteria_comparison') }}";
      }
    });
  });

  $('.check-cons').on('click', function(){
    $.ajax({
      url: 'ahp',
      type: 'GET',
      data: {from_ajax: true},
      success: function(resp){
        console.log(resp.res);
        $('.cons-status').text("Status Consistency : " + resp.res.consistency.consistency);
      }
    });
  });

</script>
@endsection
