@extends('layouts.app')
@section('title')
{{ $title }}
@stop
@section('breadcrumb')
{!! Breadcrumbs::render('assessment') !!}
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Assessment</div>

                <div class="panel-body">
                    <table class="table table-bordered table-hover table-striped table-condensed">
                      <tr>
                        <th>No</th>
                        <th>Year</th>
                        <th>Action</th>
                      </tr>
                      <?php if(count($year) == 0){ ?>
                      <tr>
                        <td colspan="4">Tidak ada Data</td>
                      </tr>
                      <?php } else {
                        $no = 1; ?>
                      @foreach($year as $item)
                      <tr>

                        <td>{{ $no++ }}</td>
                        <td>{{ $item->year }}</td>
                        <td>
                        <!--
                          {!! link_to_route('year.edit', 'Edit', array($item->id), array('class' => 'btn btn-info')) !!}

                          <button class="btn btn-danger delete" data-id="{{ $item->id }}" data-token="{{ csrf_token() }}">Delete</button>
                        -->
                        <a class="btn btn-success" href="{{ url('ahp_summary', $item->id) }}">View</a>
                        <a class="btn btn-info" href="{{ route('year.edit', $item->id) }}">Edit</a>
                        <button class="btn btn-danger delete" data-id="{{ $item->id }}" data-token="{{ csrf_token() }}">Delete</button>
                        </td>
                      </tr>
                      @endforeach
                      <?php } ?>
                    </table>
                    <a class="btn btn-info" href="{{ route('year.create') }}">Create Year Assessment</a>
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
      url: 'year/' + id,
      type: 'POST',
      data: {'_method': 'DELETE', '_token':token},
      success: function(){
        console.log('Success Delete!');
        window.location.href = "{{ url('year') }}";
      }
    });
  });

</script>
@endsection
