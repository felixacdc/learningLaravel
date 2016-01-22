<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Type</th>
        <th>Actions</th>
    </tr>

    @foreach ($users as $user)
    <tr data-id="{{ $user->id }}">
        <td>{{ $user->id }}</td>
        <td>{{ $user->full_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->type }}</td>
        <td>
            <a href="{{ route('admin.users.edit', $user) }}">Edit</a>
            <a href="#!" class="btn-delete">Remove</a>
        </td>
    </tr>
    @endforeach
</table>