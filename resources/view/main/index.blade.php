@extends('layouts.default')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('user.create') }}"> Create New User</a>
            </div>
        </div>
    </div>
    <!-- message display -->
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
    <!-- Display user data -->    
    @foreach ($user as $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name}}</td>
        <td>{{ $user->email}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('user.show',$user->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    {!! $user->render() !!}
@endsection