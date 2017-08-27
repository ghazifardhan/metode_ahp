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
  $month = '';
  $year__ = '';
} else {
  if($year){
    $year_ = $year->tahun;
    $month = $month_year[0];
    $year__ = $month_year[1];
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
                          <td>Periode</td>
                          <td>
                          <div class="row">
                          <div class="col-md-4">
                            <select name="bulan" class="form-control">
                                @foreach($listMonth as $key => $val)
                                <option value="{{$key}}" <?php if($key == $month){echo 'selected';}?> >{{$val}}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="col-md-4">
                            <select name="tahun" class="form-control">
                                @php for($x=2017;$x<2050;$x++){ @endphp
                                <option value="{{$x}}" <?php if($key == $year__){echo 'selected';}?>>{{$x}}</option>
                                @php } @endphp
                            </select>
                            </div>
                            </div>

                          </td>
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
@section('script')
<script>

    $('.datepicker').datepicker({
        changeMonth: true,
        changeYear: true,
        'dateFormat': 'mm-yy'
    });

</script>
@stop
@endsection
