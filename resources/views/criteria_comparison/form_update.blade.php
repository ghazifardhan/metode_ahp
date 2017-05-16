@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Critera</div>

                <div class="panel-body">
                  {!! Form::model($criteria, ['method' => 'PATCH', 'route' => ['criteria.update', $criteria->id], 'class' => 'form-horizontal']) !!}
                          <table class='table table-hover table-responsive table-bordered'>
                              <tr>
                                  <td>Criteria Name</td>
                                  <td><input type="text" name="criteria" class='form-control' value="{{ $criteria->criteria }}"></td>
                              </tr>
                              <tr>
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
