@extends('layouts.app')
@section('title')
{{ $title }}
@stop
@section('breadcrumb')
@if($res['create'])
{!! Breadcrumbs::render('alternative.create') !!}
@else
{!! Breadcrumbs::render('alternative.edit', $alternative) !!}
@endif
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $res['status'] }} Alternative</div>

                <div class="panel-body">

                  @if($errors->any())
                      <div class="flash alert-danger">
                          @foreach($errors->all() as $error)
                          <p>{{ $error }}</p>
                          @endforeach
                      </div>
                  @endif
                          <table class='table table-hover table-responsive table-bordered'>
                          <?php if($res['create']){ ?>
                          {!! Form::model(new App\V1\Models\Alternative, ['class' => 'form-horizontal', 'route' => 'alternative.store']) !!}
                          <?php } else { ?>
                          {!! Form::model($alternative, ['method' => 'PATCH', 'route' => ['alternative.update', $alternative->id], 'class' => 'form-horizontal']) !!}
                          <?php } ?>
                              <tr>
                                  <td>Name</td>
                                  <td><input type="text" name="alternative" class='form-control' value="<?php if($alternative){echo $alternative->alternative;} ?>"></td>
                              </tr>
                              <tr>
                                  <td>Age</td>
                                  <td><input type="number" name="age" class='form-control' value="<?php if($alternative){echo $alternative->age;} ?>"></td>
                              </tr>
                              <tr>
                                  <td>Address</td>
                                  <td><input type="text" name="address" class='form-control' value="<?php if($alternative){echo $alternative->address;} ?>"></td>
                              </tr>
                              <tr>
                                  <td>Phone Number</td>
                                  <td><input type="text" name="phone_number" class='form-control' value="<?php if($alternative){echo $alternative->phone_number;} ?>"></td>
                              </tr>
                              <tr>
                                  <td>Salary</td>
                                  <td><input type="number" name="salary" class='form-control' value="<?php if($alternative){echo $alternative->salary;} ?>"></td>
                              </tr>
                              <tr>
                                  <td>Division</td>
                                  <td><select class="form-control" name="division_id">
                                      @foreach($division as $items)
                                      <option value="{{ $items->id }}" <?php if($alternative){ if($items->id == $alternative->division_id){ echo 'selected';} } ?>>{{ $items->name }}</option>
                                      @endforeach
                                      </select>
                                  </td>
                              </tr>
                              <tr>
                                  <td></td>
                                  <td>{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                      <input type="reset" class="btn btn-warning" value="Reset">
                          {!! Form::close() !!}
                              </tr>
                          </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
