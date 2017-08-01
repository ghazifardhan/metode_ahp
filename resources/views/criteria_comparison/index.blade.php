@extends('layouts.app')
@section('breadcrumb')
@include('breadcrumb')
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
                        <td>{{ $row->criteria1->criteria }}</td>
                        <td>{{ $row->importance_level->level_name . " - " . $row->importance_level->level_value }}</td>
                        <td>{{ $row->criteria2->criteria }}</td>
                        <td>
                          {!! link_to_route('criteria_comparison.edit', 'Edit', array($row->id), array('class' => 'btn btn-info')) !!}

                          <button class="btn btn-danger delete" data-id="{{ $row->id }}" data-token="{{ csrf_token() }}">Delete</button>
                        </td>
                      </tr>
                      @endforeach
                      <?php } ?>
                    </table>
                    <a href="{{ route('criteria_comparison.create') }}">Create New Comparison</a>
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

</script>
@endsection
