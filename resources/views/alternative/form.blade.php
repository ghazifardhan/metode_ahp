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
@php

if(isset($_GET['type'])){
  $alternative_name = '';
  $alternative_date = '';
  $alternative_address = '';
  $alternative_phone = '';
  $alternative_salary = '';
} else {
  if($alternative){
    $alternative_name = $alternative->alternative;
    $alternative_date = $alternative->birthdate;
    $alternative_address = $alternative->address;
    $alternative_phone = $alternative->phone_number;
    $alternative_salary = $alternative->salary;
  }
}

@endphp
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
                                  <td><input id="alternative" type="text" name="alternative" class='form-control' value="<?php if($alternative){echo $alternative_name;} ?>"></td>
                              </tr>
                              <tr>
                                  <td>Birth Date</td>
                                  <td><input id="datepicker" type="text" name="birthdate" class='form-control' value="<?php if($alternative){echo $alternative_date;} ?>"></td>
                              </tr>
                              <tr>
                                  <td>Address</td>
                                  <td><input type="text" name="address" class='form-control' value="<?php if($alternative){echo $alternative_address;} ?>"></td>
                              </tr>
                              <tr>
                                  <td>Phone Number</td>
                                  <td><input type="text" name="phone_number" class='form-control' value="<?php if($alternative){echo $alternative_phone;} ?>"></td>
                              </tr>
                              <tr>
                                  <td>Salary</td>
                                  <td><input type="number" name="salary" class='form-control' value="<?php if($alternative){echo $alternative_salary;} ?>"></td>
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
                                    @if($alternative)
                                    <a href="{{ route('alternative.edit', $alternative->id) . '?type=reset' }}" class="btn btn-warning">Reset</a>
                                    @else
                                    <input type="reset" class="btn btn-warning" value="Reset">
                                    @endif
                          {!! Form::close() !!}

                              </tr>
                          </table>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script>

//Date picker
    $('#datepicker').datepicker();
    $('#datepicker').datepicker({
      'dateFormat': 'yy-mm-dd'
    });

    function clear_form_elements(ele) {

        tags = ele.getElementsByTagName('input');
        for(i = 0; i < tags.length; i++) {
            switch(tags[i].type) {
                case 'password':
                case 'text':
                    tags[i].value = '';
                    break;
                case 'checkbox':
                case 'radio':
                    tags[i].checked = false;
                    break;
            }
        }

        tags = ele.getElementsByTagName('select');
        for(i = 0; i < tags.length; i++) {
            if(tags[i].type == 'select-one') {
                tags[i].selectedIndex = 0;
            }
            else {
                for(j = 0; j < tags[i].options.length; j++) {
                    tags[i].options[j].selected = false;
                }
            }
        }

        tags = ele.getElementsByTagName('textarea');
        for(i = 0; i < tags.length; i++) {
            tags[i].value = '';
        }

    }

</script>
@stop
@endsection
