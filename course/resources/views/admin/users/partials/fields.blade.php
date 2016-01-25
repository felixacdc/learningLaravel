<div class="form-group">
    {!! Form::label('email', 'E-Mail Address') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter password']) !!}
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
    {!! Form::select('type', config('options.types'), null, ['class' => 'form-control']) !!}
</div>