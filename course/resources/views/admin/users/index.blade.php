@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body">
                    <p>
                        <a class="btn btn-info" href="{{ route('admin.users.create') }}" role="button">
                            Nuevo Usuario
                        </a>
                    </p>
                    <p>There are {{ $users->lastPage() }} pages, Total records: {{ $users->total() }}, Actual Page: {{ $users->currentPage() }} </p>
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>

                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type }}</td>
                            <td>
                                <a href="">Edit</a>
                                <a href="">Remove</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <!-- Agregar paginacion -->
                    {!! $users->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection