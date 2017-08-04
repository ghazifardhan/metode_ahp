@extends('layouts.app')
@section('title')
{{ $title }}
@stop
@section('breadcrumb')
{!! Breadcrumbs::render('alternative.show', $alternative) !!}
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $alternative->alternative }}</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                      <tr>
                        <td>ID</td>
                        <td>{{ $alternative->id }}</td>
                      </tr>
                      <tr>
                        <td>Name</td>
                        <td>{{ $alternative->alternative }}</td>
                      </tr>
                      <tr>
                        <td>Age</td>
                        <td>{{ $alternative->age }}</td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td>{{ $alternative->address }}</td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                        <td>{{ $alternative->phone_number }}</td>
                      </tr>
                      <tr>
                        <td>Salary</td>
                        <td>{{ $alternative->salary }}</td>
                      </tr>
                      <tr>
                        <td>Division</td>
                        <td>{{ $alternative->division->name }}</td>
                      </tr>
                    </table>

                    <!--
                    <form method="post" action="{{ url('test') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="alternative_id" value="{{ $alternative->id }}">
                      <table class="table table-bordered">
                          @foreach($criteria as $row)
                          <tr>
                            <td>{{ $row->criteria }}</td>
                            <input type="hidden" name="criteria_id[]" value="{{ $row->id }}">
                            <td><input name="value[]" class="form-control"></td>
                          </tr>
                          @endforeach
                      </table>
                      <input type="submit" name="submit" value="submit" class="btn btn-success">
                    </form>
                    -->

                    <table class="table table-bordered table-hover table-striped table-condensed">
                      <tr>
                        <th>No</th>
                        <th>Year</th>
                        <th>Action</th>
                      </tr>
                      <?php if(count($year) == 0){ ?>
                      <tr>
                        <td colspan="4">Tidak ada Data</td>
                      </tr>
                      <?php } else {
                        $no = 1; ?>
                      @foreach($year as $item)
                      <tr>

                        <td>{{ $no++ }}</td>
                        <td>{{ $item->year }}</td>
                        <td>
                          <a class="btn btn-success" href="{{ route('alternative.assessment', [$alternative->id, $item->id]) }}">Create Assessment</a>
                        </td>
                      </tr>
                      @endforeach
                      <?php } ?>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
