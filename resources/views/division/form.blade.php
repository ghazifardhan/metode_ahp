@extends('layouts.app')
@section('title')
{{ $title }}
@stop
@section('breadcrumb')
@if($res['create'])
{!! Breadcrumbs::render('division.create') !!}
@else
{!! Breadcrumbs::render('division.edit', $division) !!}
@endif
@stop
@section('content')
@php

if(isset($_GET['type'])){
  $division_name = '';
} else {
  if($division){
    $division_name = $division->name;
  }
}

@endphp
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$res['status']}} Division</div>

                <div class="panel-body">
                  @if($errors->any())
                    <div class="flash alert-danger">
                        @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                  @endif
                    <?php if($res['create']){ ?>
                    {!! Form::model(new App\V1\Models\Division, ['class' => 'form-horizontal', 'route' => 'division.store']) !!}
                    <?php } else { ?>
                    {!! Form::model($division, ['method' => 'PATCH', 'route' => ['division.update', $division->id], 'class' => 'form-horizontal']) !!}
                    <?php } ?>
                          <table class='table table-hover table-responsive table-bordered'>
                              <tr>
                                  <td>Division Name</td>
                                  <td><input type="text" name="name" class='form-control' value="<?php if($division){echo $division_name;}?>"></td>
                              </tr>
                              <tr>
                                  <td></td>
                                  <td>{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                    @if($division)
                                    <a href="{{ route('division.edit', $division->id) . '?type=reset' }}" class="btn btn-warning">Reset</a>
                                    @else
                                    <input type="reset" class="btn btn-warning" value="Reset">
                                    @endif
                              </tr>
                          </table>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
