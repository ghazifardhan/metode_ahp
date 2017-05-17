@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @foreach($matrix as $key => $val)
                    <table class="table table-bordered">
                      <tr>
                        <th colspan="{{ count($alternative)+1 }}">{{ $matrix[$key]['criteria_name'] }}</th>
                      </tr>
                        <td>{{ $matrix[$key]['criteria_name'] }}</td>
                        @foreach($alternative as $items)
                        <td>{{ $items->alternative }}</td>
                        @endforeach
                      </tr>
                      @foreach($alternative as $x => $y)
                      <tr>
                      <td>{{ $alternative[$x]['alternative'] }}</td>
                      @foreach($matrix[$key]['result'] as $k => $v)
                          <td>{{ $matrix[$key]['result'][$x][$k] }}</td>
                      @endforeach
                      </tr>
                      @endforeach
                    </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
