@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User {{ $user->first_name }}</div>
                <div class="panel-body">

                     @include('admin.partials.messages')
                     
                    <!-- el Form::model me permite atar un modelo a un formulario en este caso $user es el modelo -->
                    {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}
                        
                        <!-- Incluimos el partials -->
                        @include('admin.users.partials.fields')

                        <button type="submit" class="btn btn-default">Edit User</button>
                            
                    {!! Form::close() !!}

                </div>
            </div>

            @include('admin.users.partials.delete')
        </div>
    </div>
</div>
@endsection