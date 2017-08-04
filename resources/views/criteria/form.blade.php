@extends('layouts.app')
@section('title')
{{ $title }}
@stop
@section('breadcrumb')
@if($res['create'])
{!! Breadcrumbs::render('criteria.create') !!}
@else
{!! Breadcrumbs::render('criteria.edit', $criteria) !!}
@endif
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $res['status'] }} Criteria</div>

                <div class="panel-body">
                  @if($errors->any())
                    <div class="flash alert-danger">
                        @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                  @endif
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
                                  <td>{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                        <input type="reset" class="btn btn-warning" value="Reset"></td>
                              </tr>
                          </table>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
