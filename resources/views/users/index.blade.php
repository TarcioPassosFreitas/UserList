@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de usuários</h1>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->age }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-action"><i class="fas fa-edit"></i> Edit</a>
                   
                    <button class="btn btn-danger btn-action" onclick="confirmDelete({{ $user->id }})">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection

@section('scripts')
<script>
    function confirmDelete(id) {
        if (confirm("Você deseja excluir esse usuário?")) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = "/users/delete/" + id;

            var hiddenInputMethod = document.createElement('input');
            hiddenInputMethod.type = 'hidden';
            hiddenInputMethod.name = '_method';
            hiddenInputMethod.value = 'DELETE';
            form.appendChild(hiddenInputMethod);

            var hiddenInputToken = document.createElement('input');
            hiddenInputToken.type = 'hidden';
            hiddenInputToken.name = '_token';
            hiddenInputToken.value = '{{ csrf_token() }}';
            form.appendChild(hiddenInputToken);

            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
@endsection
