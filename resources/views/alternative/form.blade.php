@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Alternative</div>

                <div class="panel-body">
                  {!! Form::model(new App\V1\Models\Alternative, ['class' => 'form-horizontal', 'route' => 'alternative.store']) !!}
                          <table class='table table-hover table-responsive table-bordered'>
                              <tr>
                                  <td>Name</td>
                                  <td><input type="text" name="alternative" class='form-control'></td>
                              </tr>
                              <tr>
                                  <td>Age</td>
                                  <td><input type="number" name="age" class='form-control'></td>
                              </tr>
                              <tr>
                                  <td>Address</td>
                                  <td><input type="text" name="address" class='form-control'></td>
                              </tr>
                              <tr>
                                  <td>Phone Number</td>
                                  <td><input type="text" name="phone_number" class='form-control'></td>
                              </tr>
                              <tr>
                                  <td>Salary</td>
                                  <td><input type="number" name="salary" class='form-control'></td>
                              </tr>
                              <tr>
                                  <td>Division</td>
                                  <td><select class="form-control" name="division_id">
                                      @foreach($division as $items)
                                      <option value="{{ $items->id }}">{{ $items->name }}</option>
                                      @endforeach
                                      </select>
                                  </td>
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
