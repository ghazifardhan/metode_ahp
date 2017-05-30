@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

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
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
