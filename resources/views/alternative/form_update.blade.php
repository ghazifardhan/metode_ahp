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
                                  <td>Age</td>
                                  <td><input type="number" name="age" class='form-control' value="{{ $alternative->age }}"></td>
                              </tr>
                              <tr>
                                  <td>Address</td>
                                  <td><input type="text" name="address" class='form-control' value="{{ $alternative->address }}"></td>
                              </tr>
                              <tr>
                                  <td>Phone Number</td>
                                  <td><input type="text" name="phone_number" class='form-control' value="{{ $alternative->phone_number }}"></td>
                              </tr>
                              <tr>
                                  <td>Salary</td>
                                  <td><input type="number" name="salary" class='form-control' value="{{ $alternative->salary }}"></td>
                              </tr>
                              <tr>
                                  <td>Division</td>
                                  <td><select class="form-control" name="division_id">
                                      @foreach($division as $items)
                                      <option value="{{ $items->id }}" <?php if($alternative->division_id==$items->id){ echo 'selected';}?>>{{ $items->name }}</option>
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
