@extends('layouts.app')
@section('title')
{{ $title }}
@stop
@section('breadcrumb')
{!! Breadcrumbs::render('division') !!}
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Division</div>

                <div class="panel-body">
                    <table class="table table-bordered table-hover table-striped table-condensed">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                      <?php
                      if(count($division) == 0){
                      ?>
                      <tr>
                        <td colspan="3">Tidak ada data</td>
                      </tr>
                      <?php } else {
                        $no = 1;?>
                      @foreach($division as $divisions)
                      <tr>

                        <td>{{ $no++ }}</td>
                        <td>{{ $divisions->nama }}</td>
                        <td>
                          {!! link_to_route('division.edit', 'Edit', array($divisions->id), array('class' => 'btn btn-info')) !!}

                          <button class="btn btn-danger delete" data-id="{{ $divisions->id }}" data-token="{{ csrf_token() }}">Delete</button>
                        </td>
                      </tr>
                      @endforeach
                      <?php } ?>
                    </table>
                    <a class="btn btn-info" href="{{ route('division.create') }}">Create New Division</a>
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
      url: 'division/' + id,
      type: 'POST',
      data: {'_method': 'DELETE', '_token':token},
      success: function(){
        console.log('Success Delete!');
        window.location.href = "{{ url('division') }}";
      }
    });
  });

</script>
@endsection
