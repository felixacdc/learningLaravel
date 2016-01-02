@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">New User</div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}

                        <div class="form-group">
                            {!! Form::label('email', 'E-Mail Address') !!}
                            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Enter password']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('first_name', 'First Name') !!}
                            {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Enter first name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('last_name', 'Last Name') !!}
                            {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Enter last name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('type', 'Type User') !!}
                            {!! Form::select('type', ['' => 'Select Type', 'user' => 'User', 'admin' => 'Administrator'], null, ['class' => 'form-control']) !!}
                        </div>
                        <button type="submit" class="btn btn-default">Create User</button>
                            
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection