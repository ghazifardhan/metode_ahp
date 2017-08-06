@extends('layouts.app')
@section('title')
{{ $title }}
@stop
@section('breadcrumb')
{!! Breadcrumbs::render('rank_salary') !!}
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
                        <th>ID</th>
                        <th>Rank</th>
                        <th>Salary Upgrade</th>
                        <th>Action</th>
                      </tr>
                      <?php if(count($rank_salary) == 0){ ?>
                      <tr>
                        <td colspan="4">Tidak ada Data</td>
                      </tr>
                      <?php } else {
                        $no = 1; ?>
                      @foreach($rank_salary as $rank_salaries)
                      <tr>

                        <td>{{ $no++ }}</td>
                        <td>{{ $rank_salaries->rank }}</td>
                        <td>{{ "Rp " . number_format($rank_salaries->up_salary, "0", ",", ".") }}</td>
                        <td>
                          {!! link_to_route('rank_salary.edit', 'Edit', array($rank_salaries->id), array('class' => 'btn btn-info')) !!}

                          <button class="btn btn-danger delete" data-id="{{ $rank_salaries->id }}" data-token="{{ csrf_token() }}">Delete</button>
                        </td>
                      </tr>
                      @endforeach
                      <?php } ?>
                    </table>
                    <a class="btn btn-info" href="{{ route('rank_salary.create') }}">Create New Rank Salary</a>
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
      url: 'rank_salary/' + id,
      type: 'POST',
      data: {'_method': 'DELETE', '_token':token},
      success: function(){
        console.log('Success Delete!');
        window.location.href = "{{ url('rank_salary') }}";
      }
    });
  });

</script>
@endsection
