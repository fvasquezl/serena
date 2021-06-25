<div>
    {{-- <div class="card">
        <div class="card-body">

            <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-plus"></i> Create User</button>
        </div>
    </div> --}}
    <div class="card">
        <div class="card-header">
            <input wire:keydown="clear_page" wire:model="search" class="form-control w-100"
                placeholder="Escriba un nombre...">
        </div>
        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width="100px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $user) }}">
                                        <i class="fas fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i
                                            class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros...</strong>
            </div>
        @endif
    </div>
</div>
