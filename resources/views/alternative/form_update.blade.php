@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Alternative</div>

                <div class="panel-body">
                  {!! Form::model($alternative, ['method' => 'PATCH', 'route' => ['alternative.update', $alternative->id], 'class' => 'form-horizontal']) !!}
                          <table class='table table-hover table-responsive table-bordered'>
                              <tr>
                                  <td>Alternative Name</td>
                                  <td><input type="text" name="alternative" class='form-control' value="{{ $alternative->alternative }}"></td>
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
