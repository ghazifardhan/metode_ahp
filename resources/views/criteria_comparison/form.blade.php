@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Comparison</div>

                <div class="panel-body">
                  {!! Form::model(new App\V1\Models\CriteriaComparison, ['class' => 'form-horizontal', 'route' => 'criteria_comparison.store']) !!}
                          <table class='table table-hover table-responsive table-bordered'>
                              <tr>
                                <th>Criteria Name 1</th>
                                <th>Level</th>
                                <th>Criteria Name 2</th>
                              </tr>
                              <tr>
                                  <td>
                                    <select name="criteria_id_1" class="form-control">
                                      @foreach($criteria as $items)
                                        <option value="{{ $items->id }}">{{ $items->criteria }}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <select name="value" class="form-control">
                                      @foreach($importance_level as $items)
                                        <option value="{{ $items->id }}">{{ $items->level_name . " - " . $items->level_value }}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <select name="criteria_id_2" class="form-control">
                                      @foreach($criteria as $items)
                                        <option value="{{ $items->id }}">{{ $items->criteria }}</option>
                                      @endforeach
                                    </select>
                                  </td>
                              </tr>
                              <tr>
                                  <td></td>
                                  <td></td>
                                  <td>{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}</td>
                              </tr>
                          </table>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
