@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('main.create') }}"> Create New User</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Operation</th>
        </tr>
    @foreach ($main as $main)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $main->name}}</td>
        <td>{{ $main->email}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('main.show',$main->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('main.edit',$main->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['main.destroy', $main->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {!! $main->render() !!}
@endsection