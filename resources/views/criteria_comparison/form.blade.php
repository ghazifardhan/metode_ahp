@extends('layouts.app')
@section('title')
{{ $title }}
@stop
@section('breadcrumb')
@if($res['create'])
{!! Breadcrumbs::render('criteria_comparison.create') !!}
@else
{!! Breadcrumbs::render('criteria_comparison.edit', $criteria_comparison) !!}
@endif
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $res['status'] }} Comparison</div>

                <div class="panel-body">
                  @if($errors->any())
                    <div class="flash alert-danger">
                        @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                  @endif
                  <?php if($res['create']){ ?>
                {!! Form::model(new App\V1\Models\CriteriaComparison, ['class' => 'form-horizontal', 'route' => 'criteria_comparison.store']) !!}
                <?php } else { ?>
                {!! Form::model($criteria_comparison, ['method' => 'PATCH', 'route' => ['criteria_comparison.update', $criteria_comparison->id], 'class' => 'form-horizontal']) !!}
                <?php } ?>
                          <table class='table table-hover table-responsive table-bordered'>
                              <tr>
                                <th>Criteria Name 1</th>
                                <th>Level</th>
                                <th>Criteria Name 2</th>
                              </tr>
                              <tr>
                                  <td>
                                    <select name="kriteria_id_1" class="form-control">
                                      @foreach($criteria as $items)
                                        <option value="{{ $items->id }}" <?php if($criteria_comparison){if($items->id == $criteria_comparison->kriteria_id_1){echo 'selected';}} ?> >{{ $items->kriteria }}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <select name="tingkat_kepentingan_id" class="form-control">
                                      @foreach($importance_level as $items)
                                        <option value="{{ $items->id }}" <?php if($criteria_comparison){if($items->id == $criteria_comparison->nilai){echo 'selected';}} ?> >{{ $items->nama_tingkat . " - " . $items->nilai_tingkat }}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <select name="kriteria_id_2" class="form-control">
                                      @foreach($criteria as $items)
                                        <option value="{{ $items->id }}" <?php if($criteria_comparison){if($items->id == $criteria_comparison->criteria_id_2){echo 'selected';}} ?> >{{ $items->kriteria }}</option>
                                      @endforeach
                                    </select>
                                  </td>
                              </tr>
                              <tr>
                                  <td></td>
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
