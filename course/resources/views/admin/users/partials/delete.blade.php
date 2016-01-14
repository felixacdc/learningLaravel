{!! Form::model($user, ['route' => ['admin.users.destroy', $user->id], 'method' => 'DELETE']) !!}
    
    <button type="submit" class="btn btn-danger">Delete User</button>
        
{!! Form::close() !!}