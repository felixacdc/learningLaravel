@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>
                

                @if (Session::has('message'))

                    <p class="alert alert-success">{{ Session::get('message') }}</p>

                @endif

                
                <div class="panel-body">
                    <p>
                        <a class="btn btn-info" href="{{ route('admin.users.create') }}" role="button">
                            Nuevo Usuario
                        </a>
                    </p>
                    <p>There are {{ $users->lastPage() }} pages, Total records: {{ $users->total() }}, Actual Page: {{ $users->currentPage() }} </p>
                    
                    @include('admin.users.partials.table')

                    <!-- Agregar paginacion -->
                    {!! $users->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection