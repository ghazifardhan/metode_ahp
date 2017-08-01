@extends('layouts.app')
@section('breadcrumb')
@include('breadcrumb')
@stop  
@section('content')
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
                                  <td><input type="text" name="name" class='form-control' value="<?php if($division){echo $division->name;}?>"></td>
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
