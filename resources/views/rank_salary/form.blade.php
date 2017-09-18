@extends('layouts.app')
@section('title')
{{ $title }}
@stop
@section('breadcrumb')
@if($res['create'])
{!! Breadcrumbs::render('rank_salary.create') !!}
@else
{!! Breadcrumbs::render('rank_salary.edit', $rank_salary) !!}
@endif
@stop
@section('content')
@php

if(isset($_GET['type'])){
  $rank_salary_rank = '';
  $rank_salary_up_salary = '';
} else {
  if($rank_salary){
    $rank_salary_rank = $rank_salary->peringkat;
    $rank_salary_up_salary = $rank_salary->kenaikan_gaji;
  }
}

@endphp
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
                          <td><input type="text" name="peringkat" class='form-control' value="<?php if($rank_salary){echo $rank_salary_rank; } ?>"></td>
                      </tr>
                      <tr>
                          <td>Salary Upgrade</td>
                          <td><input type="number" name="kenaikan_gaji" class='form-control' value="<?php if($rank_salary){echo $rank_salary_up_salary; } ?>"></td>
                      </tr>
                      <tr>
                          <td></td>
                          <td>{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                          @if($rank_salary)
                          <a href="{{ route('rank_salary.edit', $rank_salary->id) . '?type=reset' }}" class="btn btn-warning">Reset</a>
                          @else
                          <input type="reset" class="btn btn-warning" value="Reset">
                          @endif
                          </td>
                      </tr>
                  </table>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
