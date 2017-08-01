@extends('layouts.app')
@section('breadcrumb')
@include('breadcrumb')
@stop  
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">{{ $res['status'] }} Rank Salary</div>

                <div class="panel-body">
                  @if($errors->any())
                    <div class="flash alert-danger">
                        @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                  @endif
                  <?php if($res['create']){ ?>
                  {!! Form::model(new App\V1\Models\RankSalary, ['class' => 'form-horizontal', 'route' => 'rank_salary.store']) !!}
                  <?php } else { ?>
                  {!! Form::model($rank_salary, ['method' => 'PATCH', 'route' => ['rank_salary.update', $rank_salary->id], 'class' => 'form-horizontal']) !!}
                  <?php } ?>
                  <table class='table table-hover table-responsive table-bordered'>
                      <tr>
                          <td>Rank</td>
                          <td><input type="number" name="rank" class='form-control' value="<?php if($rank_salary){echo $rank_salary->rank; } ?>"></td>
                      </tr>
                      <tr>
                          <td>Salary Upgrade</td>
                          <td><input type="number" name="up_salary" class='form-control' value="<?php if($rank_salary){echo $rank_salary->up_salary; } ?>"></td>
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
