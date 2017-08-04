@extends('layouts.app')
@section('title')
{{ $title }}
@stop
@section('breadcrumb')
@include('breadcrumb')
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Asessment for {{ $alternative->alternative }}</div>

                <div class="panel-body">
                @if(count($criteria) == 0)
                <h3 align="center"> Please add criteria in criteria menu </h3>
                @else
                  <form method="post" action="{{ route('update.assessment', [$alternative->id, $year_id]) }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="alternative_id" value="{{ $alternative->id }}">
                        <table class="table table-bordered">
                            @foreach($criteria as $key => $val)
                            <tr>
                              <td>{{ $criteria[$key]['criteria'] }}</td>
                              <input type="hidden" name="criteria_id[]" value="{{ $criteria[$key]['id'] }}">
                              <td><input name="value[]" class="form-control" value="{{ $data_alternative[$key]['value'] }}" required></td>
                            </tr>
                            @endforeach
                        </table>
                      <input type="submit" name="submit" value="submit" class="btn btn-success">
                  </form>
                  @endif
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
