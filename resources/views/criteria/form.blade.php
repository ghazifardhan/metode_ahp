@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $res['status'] }} Criteria</div>

                <div class="panel-body">
                  <?php if($res['create']){ ?>
                  {!! Form::model(new App\V1\Models\Criteria, ['class' => 'form-horizontal', 'route' => 'criteria.store']) !!}
                  <?php } else { ?>
                  {!! Form::model($criteria, ['method' => 'PATCH', 'route' => ['criteria.update', $criteria->id], 'class' => 'form-horizontal']) !!}
                  <?php } ?>
                          <table class='table table-hover table-responsive table-bordered'>
                              <tr>
                                  <td>Criteria Name</td>
                                  <td><input type="text" name="criteria" class='form-control' value="<?php if($criteria){echo $criteria->criteria;} ?>"></td>
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
