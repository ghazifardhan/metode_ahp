@extends('layouts.app')
@section('title')
{{ $title }}
@stop
@section('breadcrumb')
@if($res['create'])
{!! Breadcrumbs::render('assessment.create') !!}
@else
{!! Breadcrumbs::render('assessment.edit', $year) !!}
@endif
@stop
@section('content')
@php

if(isset($_GET['type'])){
  $year_ = '';
} else {
  if($year){
    $year_ = $year->tahun;
  }
}

@endphp
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">{{ $res['status'] }} Assessment Year</div>

                <div class="panel-body">
                  @if($errors->any())
                    <div class="flash alert-danger">
                        @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                  @endif
                  <?php if($res['create']){ ?>
                  {!! Form::model(new App\V1\Models\Year, ['class' => 'form-horizontal', 'route' => 'year.store']) !!}
                  <?php } else { ?>
                  {!! Form::model($year, ['method' => 'PATCH', 'route' => ['year.update', $year->id], 'class' => 'form-horizontal']) !!}
                  <?php } ?>
                  <table class='table table-hover table-responsive table-bordered'>
                      <tr>
                          <td>Year</td>
                          <td><input type="number" name="tahun" class='form-control' value="<?php if($year){echo $year_; } ?>"></td>
                      </tr>
                      <tr>
                          <td></td>
                          <td>{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                          @if($year)
                          <a href="{{ route('year.edit', $year->id) . '?type=reset' }}" class="btn btn-warning">Reset</a>
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
