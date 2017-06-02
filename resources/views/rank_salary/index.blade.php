@extends('layouts.app')
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
                      @foreach($rank_salary as $rank_salaries)
                      <tr>

                        <td>{{ $rank_salaries->id }}</td>
                        <td>{{ $rank_salaries->rank }}</td>
                        <td>{{ "Rp " . number_format($rank_salaries->up_salary, "0", ",", ".") }}</td>
                        <td>
                          {!! link_to_route('rank_salary.edit', 'Edit', array($rank_salaries->id), array('class' => 'btn btn-info')) !!}

                          <button class="btn btn-danger delete" data-id="{{ $rank_salaries->id }}" data-token="{{ csrf_token() }}">Delete</button>
                        </td>
                      </tr>
                      @endforeach
                    </table>
                    <a href="{{ route('rank_salary.create') }}">Create New Rank Salary</a>
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
