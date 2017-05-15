@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="table table-border">
                      <tr>
                        <th>ID</th>
                        <th>Alternative</th>
                        <th>Action</th>
                      </tr>
                      @foreach($alternative as $alternatives)
                      <tr>
                        <td><?php echo $alternatives->id; ?></td>
                        <td><?php echo $alternatives->alternative; ?></td>
                      </tr>
                      @endforeach
                    </table>
                    <a href="{{ route('alternative.create') }}">Create New Alternative</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
