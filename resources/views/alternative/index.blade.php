@extends('layouts.app')
@section('title')
{{ $title }}
@stop
@section('breadcrumb')
{!! Breadcrumbs::render('alternative') !!}
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Master Data Karyawan</div>

                <div class="panel-body">
                    <table class="table table-bordered table-hover table-striped table-condensed">
                      <tr>
                        <th>ID</th>
                        <th>Alternative</th>
                        <th>Action</th>
                      </tr>
                      <?php if(count($alternative) == 0){ ?>
                      <tr>
                        <td colspan="3">Tidak ada Data</td>
                      </tr>
                      <?php } else { ?>
                      @foreach($alternative as $alternatives)
                      <tr>

                        <td>{{ $alternatives->id }}</td>
                        <td>{!! link_to_route('alternative.show', $alternatives->alternative, array($alternatives->id), array('class' => '')) !!}</td>
                        <td>
                          {!! link_to_route('alternative.edit', 'Edit', array($alternatives->id), array('class' => 'btn btn-info')) !!}

                          <button class="btn btn-danger delete" data-id="{{ $alternatives->id }}" data-token="{{ csrf_token() }}">Delete</button>
                        </td>
                      </tr>
                      @endforeach
                    <?php } ?>
                    </table>
                    <a class="btn btn-info" href="{{ route('alternative.create') }}">Create New Alternative</a>
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
      url: '{{ url('alternative') }}/' + id,
      type: 'POST',
      data: {'_method': 'DELETE', '_token':token},
      success: function(){
        console.log('Success Delete!');
        window.location.href = "{{ url('alternative') }}";
      }
    });
  });

</script>
@endsection
